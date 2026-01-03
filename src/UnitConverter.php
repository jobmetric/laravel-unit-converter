<?php

namespace JobMetric\UnitConverter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use JobMetric\PackageCore\Output\Response;
use JobMetric\PackageCore\Services\AbstractCrudService;
use JobMetric\UnitConverter\Events\UnitDeleteEvent;
use JobMetric\UnitConverter\Events\UnitStoreEvent;
use JobMetric\UnitConverter\Events\UnitUpdateEvent;
use JobMetric\UnitConverter\Exceptions\CannotDeleteDefaultValueException;
use JobMetric\UnitConverter\Exceptions\FromAndToMustSameTypeException;
use JobMetric\UnitConverter\Exceptions\UnitNotFoundException;
use JobMetric\UnitConverter\Exceptions\UnitTypeCannotChangeDefaultValueException;
use JobMetric\UnitConverter\Exceptions\UnitTypeDefaultValueException;
use JobMetric\UnitConverter\Exceptions\UnitTypeUseDefaultValueException;
use JobMetric\UnitConverter\Exceptions\UnitTypeUsedInException;
use JobMetric\UnitConverter\Http\Requests\StoreUnitRequest;
use JobMetric\UnitConverter\Http\Requests\UpdateUnitRequest;
use JobMetric\UnitConverter\Http\Resources\UnitRelationResource;
use JobMetric\UnitConverter\Http\Resources\UnitResource;
use JobMetric\UnitConverter\Models\Unit as UnitModel;
use JobMetric\UnitConverter\Models\UnitRelation;
use Throwable;

/**
 * Class UnitConverter
 *
 * CRUD and management service for Unit entities.
 * Responsibilities:
 * - Validate & normalize payloads via Request classes
 * - Handle unit conversion between different units of the same type
 * - Manage default unit values per type (first unit must have value = 1)
 * - Fire domain events on mutations
 * - Provide helpers for conversion, default value management, and usage tracking
 *
 * @package JobMetric\UnitConverter
 */
class UnitConverter extends AbstractCrudService
{
    /**
     * Human-readable entity name key used in response messages.
     *
     * @var string
     */
    protected string $entityName = 'unit::base.entity_names.unit';

    /**
     * Bound model/resource classes for the base CRUD.
     *
     * @var class-string
     */
    protected static string $modelClass = UnitModel::class;
    protected static string $resourceClass = UnitResource::class;

    /**
     * Allowed fields for selection/filter/sort in QueryBuilder.
     *
     * @var string[]
     */
    protected static array $fields = [
        'id',
        'type',
        'value',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Domain events mapping for CRUD lifecycle.
     *
     * @var class-string|null
     */
    protected static ?string $storeEventClass = UnitStoreEvent::class;
    protected static ?string $updateEventClass = UnitUpdateEvent::class;
    protected static ?string $deleteEventClass = UnitDeleteEvent::class;

    /**
     * Mutate/validate payload before create.
     *
     * Role: ensures a clean, validated input for store().
     * Validates that the first unit of a type has value = 1 (base unit).
     *
     * @param array<string,mixed> $data
     *
     * @return void
     * @throws Throwable
     */
    protected function changeFieldStore(array &$data): void
    {
        $data = dto($data, StoreUnitRequest::class);

        $unit_count_in_type = UnitModel::query()->where('type', $data['type'])->count();

        if ($unit_count_in_type == 0 && $data['value'] != 1) {
            throw new UnitTypeDefaultValueException($data['type']);
        }

        if ($unit_count_in_type >= 1 && $data['value'] == 1) {
            throw new UnitTypeUseDefaultValueException($data['type']);
        }
    }

    /**
     * Mutate/validate payload before update.
     *
     * Role: aligns input with update rules for the specific Unit.
     * Prevents changing the default unit value (value = 1) to a different value.
     *
     * @param Model $model
     * @param array<string,mixed> $data
     *
     * @return void
     * @throws Throwable
     */
    protected function changeFieldUpdate(Model $model, array &$data): void
    {
        /** @var UnitModel $unit */
        $unit = $model;

        $data = dto($data, UpdateUnitRequest::class, [
            'unit_id' => $unit->id,
        ]);

        if (array_key_exists('value', $data)) {
            if ($unit->value == 1 && $data['value'] != 1) {
                throw new UnitTypeCannotChangeDefaultValueException;
            }
        }
    }

    /**
     * Hook after create: save translations for the unit.
     *
     * @param Model $model
     * @param array<string,mixed> $data
     *
     * @return void
     * @throws Throwable
     */
    protected function afterStore(Model $model, array &$data): void
    {
        /** @var UnitModel $unit */
        $unit = $model;

        if (isset($data['translation'])) {
            $unit->translate(app()->getLocale(), [
                'name'        => $data['translation']['name'],
                'code'        => $data['translation']['code'],
                'position'    => $data['translation']['position'] ?? 'left',
                'description' => $data['translation']['description'] ?? null,
            ]);
        }
    }

    /**
     * Hook after update: update translations if provided.
     *
     * @param Model $model
     * @param array<string,mixed> $data
     *
     * @return void
     * @throws Throwable
     */
    protected function afterUpdate(Model $model, array &$data): void
    {
        /** @var UnitModel $unit */
        $unit = $model;

        if (array_key_exists('translation', $data)) {
            $translations = [];
            if (array_key_exists('name', $data['translation'])) {
                $translations['name'] = $data['translation']['name'];
            }

            if (array_key_exists('code', $data['translation'])) {
                $translations['code'] = $data['translation']['code'];
            }

            if (array_key_exists('position', $data['translation'])) {
                $translations['position'] = $data['translation']['position'];
            }

            if (array_key_exists('description', $data['translation'])) {
                $translations['description'] = $data['translation']['description'];
            }

            if (!empty($translations)) {
                $unit->translate(app()->getLocale(), $translations);
            }
        }
    }

    /**
     * Hook before delete: validate that unit can be deleted.
     *
     * Role: prevents deletion of units that are in use or are the default unit
     * when other units of the same type exist.
     *
     * @param Model $model
     *
     * @return void
     * @throws Throwable
     */
    protected function beforeDestroy(Model $model): void
    {
        /** @var UnitModel $unit */
        $unit = $model;

        $check_used = $this->hasUsed($unit->id);

        if ($check_used) {
            $count = UnitRelation::query()->where([
                'unit_id' => $unit->id,
            ])->count();

            throw new UnitTypeUsedInException($unit->id, $count);
        }

        if ($unit->value == 1) {
            $unit_count = UnitModel::query()->where('type', $unit->type)->count();

            if ($unit_count > 1) {
                throw new CannotDeleteDefaultValueException;
            }
        }
    }

    /**
     * Hook after delete: clean up translations.
     *
     * @param Model $model
     *
     * @return void
     */
    protected function afterDestroy(Model $model): void
    {
        /** @var UnitModel $unit */
        $unit = $model;

        $unit->translations()->delete();
    }

    /**
     * Get the unit model object by ID.
     *
     * Role: retrieve a unit model instance for direct manipulation.
     *
     * @param int $unit_id
     *
     * @return Builder|Model
     * @throws Throwable
     */
    public function getObject(int $unit_id): Builder|Model
    {
        $unit = UnitModel::query()->where('id', $unit_id)->first();

        if (!$unit) {
            throw new UnitNotFoundException($unit_id);
        }

        return $unit;
    }

    /**
     * Get the specified unit with optional relations and locale.
     *
     * Role: retrieve a single unit with translations and optional relations.
     * Returns a Response object with the unit resource.
     *
     * @param int $unit_id
     * @param array<int,string> $with
     * @param string|null $locale
     *
     * @return Response
     * @throws Throwable
     */
    public function get(int $unit_id, array $with = [], string $locale = null): Response
    {
        if (!in_array('translations', $with)) {
            $with[] = 'translations';
        }

        global $translationLocale;
        if (!is_null($locale)) {
            $translationLocale = $locale;
        }

        return $this->show($unit_id, $with);
    }

    /**
     * Override show to add translations by default.
     *
     * @param int $id
     * @param array<int,string> $with
     * @param string|null $mode
     *
     * @return Response
     */
    protected function show(int $id, array $with = [], ?string $mode = null): Response
    {
        if (!in_array('translations', $with)) {
            $with[] = 'translations';
        }

        return parent::show($id, $with, $mode);
    }

    /**
     * Change the default unit for a type and recalculate all related units.
     *
     * Role: sets a new base unit (value = 1) for a type and adjusts all other
     * units of the same type proportionally.
     *
     * @param int $unit_id
     *
     * @return Response
     * @throws Throwable
     */
    public function changeDefaultValue(int $unit_id): Response
    {
        return DB::transaction(function () use ($unit_id) {
            /** @var UnitModel $unit */
            $unit = UnitModel::find($unit_id);

            if (!$unit) {
                throw new UnitNotFoundException($unit_id);
            }

            UnitModel::query()->where('type', $unit->type)->get()->each(function (UnitModel $item) use ($unit) {
                $item->value = $item->value / $unit->value;
                $item->save();
            });

            $this->afterCommon('changeDefaultValue', $unit);

            return Response::make(true, trans('unit::base.messages.change_default_value'), UnitResource::make($unit));
        });
    }

    /**
     * Get list of all places where this unit is used.
     *
     * Role: returns all polymorphic relations where this unit is attached
     * to models (e.g., products, orders, etc.) via the HasUnit trait.
     *
     * @param int $unit_id
     *
     * @return Response
     * @throws Throwable
     */
    public function usedIn(int $unit_id): Response
    {
        /** @var UnitModel $unit */
        $unit = UnitModel::find($unit_id);

        if (!$unit) {
            throw new UnitNotFoundException($unit_id);
        }

        $unit_relations = UnitRelation::query()->where([
            'unit_id' => $unit_id,
        ])->get();

        return Response::make(true, trans('unit::base.messages.used_in', [
            'count' => $unit_relations->count(),
        ]), UnitRelationResource::collection($unit_relations));
    }

    /**
     * Check if a unit is currently being used in any relation.
     *
     * Role: quick check to determine if a unit can be safely deleted.
     *
     * @param int $unit_id
     *
     * @return bool
     * @throws Throwable
     */
    public function hasUsed(int $unit_id): bool
    {
        /** @var UnitModel $unit */
        $unit = UnitModel::find($unit_id);

        if (!$unit) {
            throw new UnitNotFoundException($unit_id);
        }

        return UnitRelation::query()->where([
            'unit_id' => $unit_id,
        ])->exists();
    }

    /**
     * Convert a value from one unit to another.
     *
     * Role: performs unit conversion between two units of the same type.
     * Formula: result = input_value * from_unit.value / to_unit.value
     *
     * @param int $from_unit_id The source unit ID.
     * @param int $to_unit_id   The target unit ID.
     * @param float $value       The value to convert.
     *
     * @return float The converted value.
     * @throws Throwable
     */
    public function convert(int $from_unit_id, int $to_unit_id, float $value): float
    {
        /** @var UnitModel $from_unit */
        $from_unit = UnitModel::find($from_unit_id);

        if (!$from_unit) {
            throw new UnitNotFoundException($from_unit_id);
        }

        /** @var UnitModel $to_unit */
        $to_unit = UnitModel::find($to_unit_id);

        if (!$to_unit) {
            throw new UnitNotFoundException($to_unit_id);
        }

        if ($from_unit->type != $to_unit->type) {
            throw new FromAndToMustSameTypeException;
        }

        return $value * $from_unit->value / $to_unit->value;
    }
}
