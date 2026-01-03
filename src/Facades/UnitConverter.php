<?php

namespace JobMetric\UnitConverter\Facades;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;
use JobMetric\PackageCore\Output\Response;
use JobMetric\UnitConverter\UnitConverter as UnitConverterService;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * UnitConverter Facade
 *
 * Provides a static interface to the UnitConverter domain service which encapsulates
 * CRUD operations and domain logic for measurement units (conversion, management, etc.).
 *
 * @mixin UnitConverterService
 *
 * @method static Response store(array $data) Handle creation of a Unit entity using the underlying service. Returns a Response with the created resource.
 * @method static Response show(int $unitId, array $with = [], ?string $mode = null) Retrieve a Unit entity (optionally with relations) wrapped in a Response.
 * @method static Response update(int $unitId, array $data, array $with = []) Update a Unit entity and return a Response with the updated resource.
 * @method static Response destroy(int $unitId, array $with = []) Delete a Unit entity and return an operation Response.
 * @method static Response paginate(int $pageLimit = 15, array $filters = [], array $with = [], ?string $mode = null) Get paginated list of units with optional filtering and relations. Returns a Response with paginated resource collection.
 * @method static Response all(array $filters = [], array $with = [], ?string $mode = null) Get all units matching the filter criteria without pagination. Returns a Response with resource collection.
 * @method static QueryBuilder query(array $filters = [], array $with = [], ?string $mode = null) Create a query builder for units with filtering and eager loading support.
 *
 * @method static Builder|Model getObject(int $unit_id) Get the unit model object by ID. Throws UnitNotFoundException if not found.
 * @method static Response get(int $unit_id, array $with = [], string|null $locale = null) Get a single unit by ID with optional relations and locale. Returns a Response with the unit resource.
 * @method static Response changeDefaultValue(int $unit_id) Change the default unit for a type and recalculate all related units. Returns a Response with the updated unit resource.
 * @method static Response usedIn(int $unit_id) Get list of all places where this unit is used (via unitRelations). Returns a Response with UnitRelationResource collection.
 * @method static bool hasUsed(int $unit_id) Check if a unit is currently being used in any relation. Returns true if used, false otherwise. Throws UnitNotFoundException if unit doesn't exist.
 * @method static float convert(int $from_unit_id, int $to_unit_id, float $value) Convert a value from one unit to another. Returns the converted value.
 */
class UnitConverter extends Facade
{
    /**
     * Get the registered name of the component in the service container.
     *
     * This accessor must match the binding defined in the package service provider.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'UnitConverter';
    }
}
