<?php

namespace JobMetric\UnitConverter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
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
 * @property Unit[] units
 *
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
                $value = $row['value'];

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

                $model->attachUnit((int) $row['unit_id'], $key, (float) $row['value']);
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
        return $this->morphToMany(Unit::class, 'unitable', config('unit.tables.unit_relation'))->withPivot([
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
     * Attach (upsert) a unit to a model by key.
     *
     * NOTE: $type parameter is treated as a "unit key" (pivot.type).
     *
     * @param int $unit_id
     * @param string $type unit key (e.g. weight, width, height)
     * @param float $value
     *
     * @return array
     * @throws Throwable
     */
    public function attachUnit(int $unit_id, string $type, float $value): array
    {
        /**
         * @var Unit $unit
         */
        $unit = Unit::find($unit_id);

        if (! $unit) {
            throw new UnitNotFoundException($unit_id);
        }

        $this->assertUnitKeyAllowed($type);
        $this->assertUnitMatchesKeyType($type, $unit);

        UnitRelation::query()->updateOrInsert([
            'unitable_id'   => $this->id,
            'unitable_type' => get_class($this),
            'type'          => $type,
        ], [
            'unit_id' => $unit_id,
            'value'   => $value,
        ]);

        return [
            'ok'      => true,
            'message' => trans('unit::base.messages.attached'),
            'data'    => UnitResource::make($unit),
            'status'  => 200,
        ];
    }

    /**
     * detach unit
     *
     * @param int $unit_id
     *
     * @return array
     * @throws Throwable
     */
    public function detachUnit(int $unit_id): array
    {
        foreach ($this->units as $unit) {
            if ($unit->id == $unit_id) {
                $data = UnitResource::make($unit);

                $this->units()->detach($unit_id);

                return [
                    'ok'      => true,
                    'message' => trans('unit::base.messages.detached'),
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
     */
    public function detachUnitKey(string $key): array
    {
        $this->assertUnitKeyAllowed($key);

        /** @var UnitRelation|null $relation */
        $relation = $this->unitRelation($key)->first();
        if (! $relation) {
            return [
                'ok'      => true,
                'message' => trans('unit::base.messages.detached'),
                'data'    => null,
                'status'  => 200,
            ];
        }

        $unit = Unit::find($relation->unit_id);
        $data = $unit ? UnitResource::make($unit) : null;

        UnitRelation::query()->where([
            'unitable_id'   => $this->id,
            'unitable_type' => get_class($this),
            'type'          => $key,
        ])->delete();

        return [
            'ok'      => true,
            'message' => trans('unit::base.messages.detached'),
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
     */
    public function getUnitValueByType(string $type, int $convert_unit_id = null): array
    {
        $this->assertUnitKeyAllowed($type);

        /**
         * @var Unit $convert_unit
         */
        $convert_unit = null;

        if ($convert_unit_id) {
            $convert_unit = Unit::query()->where('id', $convert_unit_id)->first();

            if (! $convert_unit) {
                throw new UnitNotFoundException($convert_unit_id);
            }

            $convert_unit->withTranslations(app()->getLocale());
        }

        /**
         * @var UnitRelation $unit_relation
         */
        $unit_relation = UnitRelation::query()
            ->where('unitable_id', $this->id)
            ->where('unitable_type', get_class($this))
            ->where('type', $type)
            ->first();

        if (! $unit_relation) {
            return [
                'translation' => null,
                'value'       => null,
            ];
        }

        if (! $convert_unit_id) {
            $convert_unit = Unit::query()->where('id', $unit_relation->unit_id)->first();

            if (! $convert_unit) {
                throw new UnitNotFoundException($unit_relation->unit_id);
            }

            $convert_unit->withTranslations(app()->getLocale());
        }

        $this->assertUnitMatchesKeyType($type, $convert_unit);

        $translation = translationResourceData($convert_unit->translations);

        $value = $unit_relation->value;

        return [
            'translation' => $translation[app()->getLocale()],
            'value'       => UnitConverterFacades::convert($unit_relation->unit_id, $convert_unit->id, $value),
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
}
