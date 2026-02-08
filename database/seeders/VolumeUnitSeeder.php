<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class VolumeUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter',
                    'code'        => 'L',
                    'position'    => 'left',
                    'description' => 'The liter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'لیتر',
                    'code'        => 'لیتر',
                    'position'    => 'right',
                    'description' => 'لیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // kiloliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kiloliter',
                    'code'        => 'kL',
                    'position'    => 'left',
                    'description' => 'The kiloliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'کیلولیتر',
                    'code'        => 'کیلولیتر',
                    'position'    => 'right',
                    'description' => 'کیلولیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // mililiter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliliter',
                    'code'        => 'mL',
                    'position'    => 'left',
                    'description' => 'The milliliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'میلی‌لیتر',
                    'code'        => 'میلی‌لیتر',
                    'position'    => 'right',
                    'description' => 'میلی‌لیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // deciliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 0.1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Deciliter',
                    'code'        => 'dL',
                    'position'    => 'left',
                    'description' => 'The deciliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'دسی‌لیتر',
                    'code'        => 'دسی‌لیتر',
                    'position'    => 'right',
                    'description' => 'دسی‌لیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // centiliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centiliter',
                    'code'        => 'cL',
                    'position'    => 'left',
                    'description' => 'The centiliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌لیتر',
                    'code'        => 'سانتی‌لیتر',
                    'position'    => 'right',
                    'description' => 'سانتی‌لیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // microliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microliter',
                    'code'        => 'µL',
                    'position'    => 'left',
                    'description' => 'The microliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'میکرولیتر',
                    'code'        => 'میکرولیتر',
                    'position'    => 'right',
                    'description' => 'میکرولیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // nanoliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nanoliter',
                    'code'        => 'nL',
                    'position'    => 'left',
                    'description' => 'The nanoliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'نانولیتر',
                    'code'        => 'نانولیتر',
                    'position'    => 'right',
                    'description' => 'نانولیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // dekaliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 10,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dekaliter',
                    'code'        => 'daL',
                    'position'    => 'left',
                    'description' => 'The dekaliter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'دکالیتر',
                    'code'        => 'دکالیتر',
                    'position'    => 'right',
                    'description' => 'دکالیتر یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // cc
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Centimeter',
                    'code'        => 'cc',
                    'position'    => 'left',
                    'description' => 'The cubic centimeter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌متر مکعب',
                    'code'        => 'سی‌سی',
                    'position'    => 'right',
                    'description' => 'سانتی‌متر مکعب یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);

        // cubic meter
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUME(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Meter',
                    'code'        => 'm³',
                    'position'    => 'left',
                    'description' => 'The cubic meter is a metric unit of volume.',
                ],
                'fa' => [
                    'name'        => 'متر مکعب',
                    'code'        => 'متر مکعب',
                    'position'    => 'right',
                    'description' => 'متر مکعب یک واحد حجم در سیستم متریک است.',
                ],
            ],
        ]);
    }
}
