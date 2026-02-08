<?php

namespace JobMetric\UnitConverter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use JobMetric\PackageCore\Output\Response;
use JobMetric\PackageCore\Services\AbstractCrudService;
use JobMetric\Translation\HasServiceTranslation;
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
use JobMetric\UnitConverter\Exceptions\UnitValueZeroException;
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
 *
 * Notes:
 * - A unit "type" represents an isolated conversion family (e.g., weight, length).
 * - Each type must have exactly one base unit with value = 1.
 * - All conversions are performed inside the same type.
 */
class UnitConverter extends AbstractCrudService
{
    use HasServiceTranslation;

    /**
     * Human-readable entity name key used in response messages.
     *
     * @var string
     */
    protected string $entityName = 'unit-converter::base.entity_names.unit';


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
     * Constructor.
     * Initialize translation defaults.
     */
    public function __construct()
    {
        parent::__construct();

        $this->translationDefaults = [
            'position' => 'left',
        ];
    }

    /**
     * Mutate/validate payload before create.
     *
     * Ensures:
     * - The first unit created for a given type must be the base unit (value = 1).
     * - Once a base unit exists, no other unit in the same type can use value = 1.
     *
     * @param array<string,mixed> $data
     *
     * @return void
     * @throws Throwable
     */
    protected function changeFieldStore(array &$data): void
    {
        $data = dto($data, StoreUnitRequest::class);

        $existsInType = UnitModel::query()->where('type', $data['type'])->exists();

        if (! $existsInType && (float) $data['value'] !== 1.0) {
            throw new UnitTypeDefaultValueException($data['type']);
        }

        if ($existsInType && (float) $data['value'] === 1.0) {
            throw new UnitTypeUseDefaultValueException($data['type']);
        }
    }

    /**
     * Mutate/validate payload before update.
     *
     * Prevents changing the base unit's value away from 1.
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

        if (array_key_exists('value', $data) && (float) $unit->value === 1.0 && (float) $data['value'] !== 1.0) {
            throw new UnitTypeCannotChangeDefaultValueException;
        }
    }

    /**
     * Hook after create: store translations if provided.
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

        $this->syncTranslations($unit, $data['translation'] ?? null, false);
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

        if (! array_key_exists('translation', $data)) {
            return;
        }

        $this->syncTranslations($unit, $data['translation'], true);
    }

    /**
     * Hook before delete: validate that unit can be deleted.
     *
     * Rules:
     * - A unit that is used in other models (via UnitRelation) cannot be deleted.
     * - The base unit (value = 1) cannot be deleted if other units of the same type exist.
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

        $this->ensureNotUsed($unit);

        if ((float) $unit->value === 1.0) {
            $hasOtherUnitsInType = UnitModel::query()
                ->where('type', $unit->type)
                ->whereKeyNot($unit->getKey())
                ->exists();

            if ($hasOtherUnitsInType) {
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
     * @param int $unit_id
     *
     * @return UnitModel
     * @throws Throwable
     */
    public function getObject(int $unit_id): UnitModel
    {
        return $this->findUnitOrFail($unit_id);
    }

    /**
     * Get the specified unit with translations and optional relations.
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
        $with = $this->ensureTranslationsRelation($with);

        global $translationLocale;
        if (! is_null($locale)) {
            $translationLocale = $locale;
        }

        return $this->show($unit_id, $with);
    }

    /**
     * Override show to add translations relation by default.
     *
     * @param int $id
     * @param array<int,string> $with
     * @param string|null $mode
     *
     * @return Response
     */
    protected function show(int $id, array $with = [], ?string $mode = null): Response
    {
        $with = $this->ensureTranslationsRelation($with);

        return parent::show($id, $with, $mode);
    }

    /**
     * Change the base unit for a type (set selected unit to value=1) and
     * proportionally re-calculate all other unit values in that type.
     *
     * @param int $unit_id
     *
     * @return Response
     * @throws Throwable
     */
    public function changeDefaultValue(int $unit_id): Response
    {
        return DB::transaction(function () use ($unit_id) {
            $unit = $this->findUnitOrFail($unit_id);

            if ((float) $unit->value === 0.0) {
                throw new UnitValueZeroException;
            }

            $this->ensureNotUsed($unit);

            $pivot = (float) $unit->value;

            UnitModel::query()->where('type', $unit->type)->get()->each(function (UnitModel $item) use ($pivot) {
                $item->value = (float) $item->value / $pivot;
                $item->save();
            });

            $unit->refresh();

            $this->afterCommon('changeDefaultValue', $unit);

            return Response::make(true, trans('unit-converter::base.messages.change_default_value'), UnitResource::make($unit));
        });
    }

    /**
     * Get all places where this unit is used.
     *
     * @param int $unit_id
     *
     * @return Response
     * @throws Throwable
     */
    public function usedIn(int $unit_id): Response
    {
        $this->findUnitOrFail($unit_id);

        $unitRelations = UnitRelation::query()->where('unit_id', $unit_id)->get();

        return Response::make(true, trans('unit-converter::base.messages.used_in', [
            'count' => $unitRelations->count(),
        ]), UnitRelationResource::collection($unitRelations));
    }

    /**
     * Check if a unit is used in any relation.
     *
     * @param int $unit_id
     *
     * @return bool
     * @throws Throwable
     */
    public function hasUsed(int $unit_id): bool
    {
        $this->findUnitOrFail($unit_id);

        return UnitRelation::query()->where('unit_id', $unit_id)->exists();
    }

    /**
     * Convert a value from one unit to another.
     *
     * Formula: result = input_value * from.value / to.value
     *
     * @param int $from_unit_id
     * @param int $to_unit_id
     * @param float $value
     *
     * @return float
     * @throws Throwable
     */
    public function convert(int $from_unit_id, int $to_unit_id, float $value): float
    {
        $fromUnit = $this->findUnitOrFail($from_unit_id);
        $toUnit = $this->findUnitOrFail($to_unit_id);

        if ($fromUnit->type !== $toUnit->type) {
            throw new FromAndToMustSameTypeException;
        }

        return $value * (float) $fromUnit->value / (float) $toUnit->value;
    }


    /**
     * Find a unit by code (from translations).
     *
     * @param string $code
     *
     * @return UnitModel|null
     */
    public function findUnitByCode(string $code): ?UnitModel
    {
        return UnitModel::whereTranslationField('code', $code)->first();
    }

    /**
     * Find a unit or throw a domain exception.
     *
     * @param int $unitId
     *
     * @return UnitModel
     * @throws Throwable
     */
    protected function findUnitOrFail(int $unitId): UnitModel
    {
        /** @var UnitModel|null $unit */
        $unit = UnitModel::query()->find($unitId);

        if (! $unit) {
            throw new UnitNotFoundException($unitId);
        }

        return $unit;
    }

    /**
     * Guard: throw UnitTypeUsedInException when unit is used.
     *
     * @param UnitModel $unit
     *
     * @return void
     * @throws Throwable
     */
    protected function ensureNotUsed(UnitModel $unit): void
    {
        $count = UnitRelation::query()->where('unit_id', $unit->id)->count();

        if ($count > 0) {
            throw new UnitTypeUsedInException($unit->id, $count);
        }
    }
}
