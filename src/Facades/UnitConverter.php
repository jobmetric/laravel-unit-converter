<?php

namespace JobMetric\UnitConverter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \JobMetric\UnitConverter\UnitConverter
 *
 * @method static \JobMetric\PackageCore\Output\Response store(array $data)
 * @method static \JobMetric\PackageCore\Output\Response show(int $unitId, array $with = [], ?string $mode = null)
 * @method static \JobMetric\PackageCore\Output\Response update(int $unitId, array $data, array $with = [])
 * @method static \JobMetric\PackageCore\Output\Response destroy(int $unitId, array $with = [])
 * @method static \JobMetric\PackageCore\Output\Response paginate(int $pageLimit = 15, array $filters = [], array $with = [], ?string $mode = null)
 * @method static \JobMetric\PackageCore\Output\Response all(array $filters = [], array $with = [], ?string $mode = null)
 * @method static \Spatie\QueryBuilder\QueryBuilder query(array $filters = [], array $with = [], ?string $mode = null)
 *
 * @method static \JobMetric\UnitConverter\Models\Unit getObject(int $unit_id)
 * @method static \JobMetric\PackageCore\Output\Response get(int $unit_id, array $with = [], string|null $locale = null)
 * @method static \JobMetric\PackageCore\Output\Response changeDefaultValue(int $unit_id)
 * @method static \JobMetric\PackageCore\Output\Response usedIn(int $unit_id)
 * @method static bool hasUsed(int $unit_id)
 * @method static \JobMetric\UnitConverter\Models\Unit|null findUnitByCode(string $code)
 * @method static float convert(int $from_unit_id, int $to_unit_id, float $value)
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
        return 'unit-converter';
    }
}
