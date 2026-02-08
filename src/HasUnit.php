<?php

namespace JobMetric\UnitConverter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use JobMetric\UnitConverter\Exceptions\TypeNotFoundInAllowTypesException;
use JobMetric\UnitConverter\Exceptions\UnitNotFoundException;
use JobMetric\UnitConverter\Facades\UnitConverter as UnitConverterFacades;
use JobMetric\UnitConverter\Http\Resources\UnitResource;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Models\UnitRelation;
use Throwable;

/**
 * Trait HasUnit
 *
 * Adds unit relations to Eloquent models.
 *
 * This trait mirrors the design of HasMeta/HasTranslation:
 * - Model can define a configuration property to declare allowed unit keys and their expected unit types.
 * - A virtual attribute ("unit") can be used for mass-assignment, and will be persisted after save.
 *
 * Configuration (optional):
 *   protected array $unitables = [
 *       'weight' => UnitTypeEnum::WEIGHT(),
 *       'length' => UnitTypeEnum::LENGTH(),
 *       'width'  => UnitTypeEnum::LENGTH(),
 *       'height' => UnitTypeEnum::LENGTH(),
 *   ];
 *
 * Payload example:
 *   $model->fill([
 *       'unit' => [
 *           'weight' => ['unit_id' => 1, 'value' => 2.5],
 *           'width'  => ['unit_id' => 2, 'value' => 10],
 *       ]
 *   ]);
 *
 * Pivot table note:
 * - The "type" column is treated as a unit key (e.g. weight/width/height).
 * - The actual unit type remains available on the related Unit model via $unit->type.
 *
 * @property-read Collection<int, Unit> $units
 * @property-read Collection<int, UnitRelation> $unitRelations
 *
 * @method static Builder|static hasUnitKey(string $key)
 * @method static Builder|static whereUnitEquals(string $key, int $unitId, ?float $value = null)
 * @method morphToMany(string $class, string $string, string $string1)
 */
trait HasUnit
{
    /**
     * Unitables configuration.
     *
     * Supported formats:
     * - ['*'] => allow all keys (no type enforcement)
     * - ['weight', 'length'] => keys map to the same expected type as the key
     * - ['weight' => 'weight', 'width' => 'length'] => key => expected unit type
     *
     * @var array<int,string>|array<string,string>
     */
    private array $baseUnitables = ['*'];

    /**
     * Temporarily holds unit payload passed through the model attributes ("unit").
     *
     * @var array<string, array{unit_id?:int, value?:float|int|string}|mixed>
     */
    protected array $innerUnits = [];

    /**
     * Import model-level config into base* and append 'unit' to fillable.
     *
     * @return void
     * @throws Throwable
     */
    public function initializeHasUnit(): void
    {
        if (function_exists('hasPropertyInClass')) {
            if (hasPropertyInClass($this, 'unitables')) {
                /** @var array $this ->unitables */
                $this->baseUnitables = $this->normalizeUnitables($this->unitables);
            }
        }
        else {
            if (property_exists($this, 'unitables')) {
                /** @var array $this ->unitables */
                $this->baseUnitables = $this->normalizeUnitables($this->unitables);
            }
        }

        $this->mergeFillable(['unit']);
    }

    /**
     * Wire up attribute interception and persistence.
     *
     * @return void
     * @throws Throwable
     */
    public static function bootHasUnit(): void
    {
        // Intercept the virtual "unit" attribute
        static::saving(function (Model $model) {
            if (! isset($model->attributes['unit']) || ! is_array($model->attributes['unit'])) {
                return;
            }

            $payload = $model->attributes['unit'];

            foreach ($payload as $key => $row) {
                if (! is_string($key) || $key === '') {
                    continue;
                }

                // Key must be allowed by configuration (or legacy unitAllowTypes()).
                $model->assertUnitKeyAllowed($key);

                if (! is_array($row)) {
                    continue;
                }

                if (! array_key_exists('unit_id', $row) || ! array_key_exists('value', $row)) {
                    continue;
                }

                $unitId = (int) $row['unit_id'];

                if ($unitId > 0) {
                    /** @var Unit|null $unit */
                    $unit = Unit::find($unitId);
                    if (! $unit) {
                        throw new UnitNotFoundException($unitId);
                    }

                    $model->assertUnitMatchesKeyType($key, $unit);
                }
            }

            $model->innerUnits = $payload;
            unset($model->attributes['unit']);
        });

        // Flush buffered units after save
        static::saved(function (Model $model) {
            if (empty($model->innerUnits)) {
                return;
            }

            foreach ($model->innerUnits as $key => $row) {
                if (! is_string($key) || $key === '' || ! is_array($row)) {
                    continue;
                }

                if (! array_key_exists('unit_id', $row) || ! array_key_exists('value', $row)) {
                    continue;
                }

                $model->storeUnit($key, (int) $row['unit_id'], (float) $row['value']);
            }

            $model->innerUnits = [];
        });

        // Parent without SoftDeletes: cleanup unit relations on delete.
        static::deleted(function (Model $model) {
            if (! in_array(SoftDeletes::class, class_uses_recursive($model), true)) {
                $model->unitRelations()->delete();
            }
        });

        // Parent with SoftDeletes: also cleanup on delete/forceDelete.
        if (in_array(SoftDeletes::class, class_uses_recursive(static::class), true)) {
            static::deleted(function (Model $model) {
                $model->unitRelations()->delete();
            });

            static::forceDeleted(function (Model $model) {
                $model->unitRelations()->delete();
            });
        }
    }

    /**
     * Units relation (morphToMany).
     *
     * @return MorphToMany
     */
    public function units(): MorphToMany
    {
        return $this->morphToMany(Unit::class, 'unitable', config('unit-converter.tables.unit_relation'))->withPivot([
                'type',
                'value',
            ])->withTimestamps(['created_at']);
    }

    /**
     * Unit relations (morphMany) for direct pivot access.
     *
     * @return MorphMany
     */
    public function unitRelations(): MorphMany
    {
        return $this->morphMany(UnitRelation::class, 'unitable');
    }

    /**
     * Filter unit relations by key.
     *
     * @param string $key
     *
     * @return MorphMany
     */
    public function unitRelation(string $key): MorphMany
    {
        return $this->unitRelations()->where('type', $key);
    }

    /**
     * Query scope: filter models that have a specific unit key.
     *
     * @param Builder $query
     * @param string $key
     *
     * @return Builder
     */
    public function scopeHasUnitKey(Builder $query, string $key): Builder
    {
        return $query->whereHas('unitRelations', function (Builder $q) use ($key) {
            $q->where('type', $key);
        });
    }

    /**
     * Query scope: filter models by unit key and unit_id (optionally value).
     *
     * @param Builder $query
     * @param string $key
     * @param int $unitId
     * @param float|null $value
     *
     * @return Builder
     */
    public function scopeWhereUnitEquals(Builder $query, string $key, int $unitId, ?float $value = null): Builder
    {
        return $query->whereHas('unitRelations', function (Builder $q) use ($key, $unitId, $value) {
            $q->where('type', $key)->where('unit_id', $unitId);

            if ($value !== null) {
                $q->where('value', $value);
            }
        });
    }

    /**
     * Store (upsert) a unit by key.
     *
     * @param string $key unit key (e.g. weight, width, height)
     * @param int $unitId
     * @param float $value
     *
     * @return static
     * @throws Throwable
     */
    public function storeUnit(string $key, int $unitId, float $value): static
    {
        /** @var Unit|null $unit */
        $unit = Unit::find($unitId);

        if (! $unit) {
            throw new UnitNotFoundException($unitId);
        }

        $this->assertUnitKeyAllowed($key);
        $this->assertUnitMatchesKeyType($key, $unit);

        UnitRelation::query()->updateOrInsert([
            'unitable_id'   => $this->id,
            'unitable_type' => get_class($this),
            'type'          => $key,
        ], [
            'unit_id'    => $unitId,
            'value'      => $value,
            'created_at' => now(),
        ]);

        return $this;
    }

    /**
     * Store multiple units in a batch.
     *
     * @param array<string, array{unit_id: int, value: float}> $units
     *
     * @return static
     * @throws Throwable
     */
    public function storeUnitBatch(array $units): static
    {
        foreach ($units as $key => $data) {
            if (! is_array($data) || ! isset($data['unit_id'], $data['value'])) {
                continue;
            }

            $this->storeUnit($key, (int) $data['unit_id'], (float) $data['value']);
        }

        return $this;
    }

    /**
     * Get a single unit value by key (optionally convert to another unit).
     *
     * @param string $key
     * @param int|null $convertUnitId
     *
     * @return array{unit: Unit|null, value: float|null, translation: array|null}
     * @throws Throwable
     */
    public function getUnit(string $key, ?int $convertUnitId = null): array
    {
        $this->assertUnitKeyAllowed($key);

        /** @var UnitRelation|null $relation */
        $relation = $this->unitRelation($key)->first();

        if (! $relation) {
            return [
                'unit'        => null,
                'value'       => null,
                'translation' => null,
            ];
        }

        /** @var Unit|null $unit */
        $unit = Unit::with('translations')->find($relation->unit_id);

        if (! $unit) {
            throw new UnitNotFoundException($relation->unit_id);
        }

        $translation = $this->getUnitTranslationData($unit);

        // If no conversion requested, return original
        if ($convertUnitId === null) {
            return [
                'unit'        => $unit,
                'value'       => $relation->value,
                'translation' => $translation,
            ];
        }

        /** @var Unit|null $convertUnit */
        $convertUnit = Unit::with('translations')->find($convertUnitId);

        if (! $convertUnit) {
            throw new UnitNotFoundException($convertUnitId);
        }

        $this->assertUnitMatchesKeyType($key, $convertUnit);

        $convertTranslation = $this->getUnitTranslationData($convertUnit);

        return [
            'unit'        => $convertUnit,
            'value'       => UnitConverterFacades::convert($relation->unit_id, $convertUnitId, $relation->value),
            'translation' => $convertTranslation,
        ];
    }

    /**
     * Get all units for this model.
     *
     * @return Collection<string, array{unit: Unit, value: float, translation: array|null}>
     */
    public function getUnits(): Collection
    {
        $relations = $this->unitRelations()->with('unit.translations')->get();

        return $relations->mapWithKeys(function (UnitRelation $relation) {
            $unit = $relation->unit;
            $translation = $this->getUnitTranslationData($unit);

            return [
                $relation->type => [
                    'unit'        => $unit,
                    'value'       => $relation->value,
                    'translation' => $translation,
                ],
            ];
        });
    }

    /**
     * Get all units as key-value pairs (key => value).
     *
     * @return Collection<string, float>
     */
    public function getUnitValues(): Collection
    {
        return $this->unitRelations()->pluck('value', 'type');
    }

    /**
     * Check if the model has a specific unit key.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasUnit(string $key): bool
    {
        return $this->unitRelation($key)->exists();
    }

    /**
     * Forget (delete) a unit by key.
     *
     * @param string $key
     *
     * @return static
     * @throws Throwable
     */
    public function forgetUnit(string $key): static
    {
        $this->assertUnitKeyAllowed($key);

        $this->unitRelation($key)->delete();

        return $this;
    }

    /**
     * Forget all units, optionally for a specific key.
     *
     * @param string|null $key
     *
     * @return static
     * @throws Throwable
     */
    public function forgetUnits(?string $key = null): static
    {
        if ($key !== null) {
            return $this->forgetUnit($key);
        }

        $this->unitRelations()->delete();

        return $this;
    }

    /**
     * Attach (upsert) a unit to a model by key.
     *
     * @param int $unit_id
     * @param string $type unit key (e.g. weight, width, height)
     * @param float $value
     *
     * @return array
     * @throws Throwable
     * @deprecated Use storeUnit() instead
     */
    public function attachUnit(int $unit_id, string $type, float $value): array
    {
        /** @var Unit|null $unit */
        $unit = Unit::find($unit_id);

        if (! $unit) {
            throw new UnitNotFoundException($unit_id);
        }

        $this->storeUnit($type, $unit_id, $value);

        return [
            'ok'      => true,
            'message' => trans('unit-converter::base.messages.attached'),
            'data'    => UnitResource::make($unit),
            'status'  => 200,
        ];
    }

    /**
     * Detach unit by unit_id.
     *
     * @param int $unit_id
     *
     * @return array
     * @throws Throwable
     * @deprecated Use forgetUnit() with key instead
     */
    public function detachUnit(int $unit_id): array
    {
        foreach ($this->units as $unit) {
            if ($unit->id == $unit_id) {
                $data = UnitResource::make($unit);

                $this->units()->detach($unit_id);

                return [
                    'ok'      => true,
                    'message' => trans('unit-converter::base.messages.detached'),
                    'data'    => $data,
                    'status'  => 200,
                ];
            }
        }

        throw new UnitNotFoundException($unit_id);
    }

    /**
     * Detach a unit by key.
     *
     * @param string $key
     *
     * @return array
     * @throws Throwable
     * @deprecated Use forgetUnit() instead
     */
    public function detachUnitKey(string $key): array
    {
        $this->assertUnitKeyAllowed($key);

        /** @var UnitRelation|null $relation */
        $relation = $this->unitRelation($key)->first();

        if (! $relation) {
            return [
                'ok'      => true,
                'message' => trans('unit-converter::base.messages.detached'),
                'data'    => null,
                'status'  => 200,
            ];
        }

        $unit = Unit::find($relation->unit_id);
        $data = $unit ? UnitResource::make($unit) : null;

        $this->forgetUnit($key);

        return [
            'ok'      => true,
            'message' => trans('unit-converter::base.messages.detached'),
            'data'    => $data,
            'status'  => 200,
        ];
    }

    /**
     * Get unit by key (legacy name kept).
     *
     * @param string $type
     *
     * @return MorphToMany
     * @deprecated Use getUnit() instead
     */
    public function getUnitByType(string $type): MorphToMany
    {
        return $this->units()->wherePivot('type', $type);
    }

    /**
     * Get unit value by key (legacy name kept).
     *
     * @param string $type
     * @param int|null $convert_unit_id
     *
     * @return array
     * @throws Throwable
     * @deprecated Use getUnit() instead
     */
    public function getUnitValueByType(string $type, ?int $convert_unit_id = null): array
    {
        $result = $this->getUnit($type, $convert_unit_id);

        return [
            'translation' => $result['translation'],
            'value'       => $result['value'],
        ];
    }

    /**
     * Return the configured unitables mapping for this model.
     *
     * @return array<int,string>|array<string,string>
     */
    public function getUnitables(): array
    {
        $unitables = $this->baseUnitables;

        // Legacy fallback: if model still defines unitAllowTypes(), use it as "key => key".
        if ($unitables === ['*'] && method_exists($this, 'unitAllowTypes')) {
            $types = (array) $this->unitAllowTypes();
            $unitables = $this->normalizeUnitables($types);
        }

        return $unitables;
    }

    /**
     * Determine if all keys are allowed.
     *
     * @return bool
     */
    public function unitablesAllowAll(): bool
    {
        $unitables = $this->getUnitables();

        return in_array('*', $unitables, true);
    }

    /**
     * Merge keys into whitelist. Removes '*' if present to narrow scope.
     *
     * @param array<string, string>|array<int, string> $keys
     *
     * @return void
     */
    public function mergeUnitables(array $keys): void
    {
        if ($this->unitablesAllowAll()) {
            $this->baseUnitables = [];
        }

        $normalized = $this->normalizeUnitables($keys);

        // Remove '*' from normalized if present
        if (in_array('*', $normalized, true)) {
            return;
        }

        $this->baseUnitables = array_merge($this->baseUnitables, $normalized);

        if (empty($this->baseUnitables)) {
            $this->baseUnitables = ['*'];
        }
    }

    /**
     * Remove a key from the whitelist. If becomes empty, reverts to ['*'].
     *
     * @param string $key
     *
     * @return void
     */
    public function removeUnitable(string $key): void
    {
        if (array_key_exists($key, $this->baseUnitables)) {
            unset($this->baseUnitables[$key]);
        }

        if (empty($this->baseUnitables)) {
            $this->baseUnitables = ['*'];
        }
    }

    /**
     * Normalize "unitables" definition.
     *
     * @param array $raw
     *
     * @return array<int,string>|array<string,string>
     */
    protected function normalizeUnitables(array $raw): array
    {
        if ($raw === [] || in_array('*', $raw, true)) {
            return ['*'];
        }

        $isList = array_keys($raw) === range(0, count($raw) - 1);

        if ($isList) {
            $out = [];
            foreach ($raw as $value) {
                if (! is_string($value) || $value === '') {
                    continue;
                }
                $out[$value] = $value;
            }

            return $out === [] ? ['*'] : $out;
        }

        $out = [];
        foreach ($raw as $key => $value) {
            if (! is_string($key) || $key === '') {
                continue;
            }

            if (is_string($value) && $value !== '') {
                $out[$key] = $value;
                continue;
            }

            // Support enum value-like objects with "value" property.
            if (is_object($value) && property_exists($value, 'value')) {
                /** @phpstan-ignore-next-line */
                $v = $value->value;
                if (is_string($v) && $v !== '') {
                    $out[$key] = $v;
                }
            }
        }

        return $out === [] ? ['*'] : $out;
    }

    /**
     * Ensure the given key is allowed.
     *
     * @param string $key
     *
     * @return void
     * @throws Throwable
     */
    protected function assertUnitKeyAllowed(string $key): void
    {
        $unitables = $this->getUnitables();

        if (in_array('*', $unitables, true)) {
            return;
        }

        // list format is normalized to map format, but keep safe handling.
        if (array_keys($unitables) === range(0, count($unitables) - 1)) {
            if (! in_array($key, $unitables, true)) {
                throw new TypeNotFoundInAllowTypesException($key);
            }

            return;
        }

        if (! array_key_exists($key, $unitables)) {
            throw new TypeNotFoundInAllowTypesException($key);
        }
    }

    /**
     * Ensure the given unit matches the expected type for key (if configured).
     *
     * @param string $key
     * @param Unit $unit
     *
     * @return void
     * @throws Throwable
     */
    protected function assertUnitMatchesKeyType(string $key, Unit $unit): void
    {
        $unitables = $this->getUnitables();

        if (in_array('*', $unitables, true)) {
            return;
        }

        // If key exists in mapping, enforce unit type match.
        $expectedType = null;
        if (array_keys($unitables) === range(0, count($unitables) - 1)) {
            // legacy list: key itself is the expected type.
            $expectedType = $key;
        }
        else if (array_key_exists($key, $unitables)) {
            $expectedType = $unitables[$key];
        }

        if ($expectedType !== null && $unit->type !== $expectedType) {
            // Reuse existing exception class for a clear 400 response.
            throw new TypeNotFoundInAllowTypesException($unit->type);
        }
    }

    /**
     * Get translation data for a unit in the current locale.
     *
     * @param Unit $unit
     * @param string|null $locale
     *
     * @return array|null
     */
    protected function getUnitTranslationData(Unit $unit, ?string $locale = null): ?array
    {
        $locale = $locale ?? app()->getLocale();

        // Use translationResourceData helper if available
        if (function_exists('translationResourceData')) {
            $data = translationResourceData($unit->translations, $locale);

            return $data[$locale] ?? null;
        }

        // Fallback: manually build translation data
        $translations = $unit->translations->where('locale', $locale);

        if ($translations->isEmpty()) {
            return null;
        }

        $result = [];
        foreach ($translations as $translation) {
            $result[$translation->field] = $translation->value;
        }

        return $result;
    }
}
