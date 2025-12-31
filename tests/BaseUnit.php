<?php

namespace JobMetric\UnitConverter\Tests;

use App\Models\Product;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;
use JobMetric\UnitConverter\Models\Unit as UnitModels;
use Tests\BaseDatabaseTestCase as BaseTestCase;

class BaseUnit extends BaseTestCase
{
    /**
     * create a fake product
     *
     * @return Product
     */
    public function create_product(): Product
    {
        return Product::factory()->create();
    }

    /**
     * create a fake unit
     *
     * @return UnitModels
     */
    public function create_unit(): UnitModels
    {
        UnitConverter::store([
            'type' => UnitTypeEnum::WEIGHT(),
            'value' => 1,
            'status' => true,
            'translation' => [
                'name' => 'Gram',
                'code' => 'g',
                'position' => 'left',
                'description' => 'The gram is a metric system unit of mass.',
            ],
        ]);

        return UnitModels::find(1);
    }
}
