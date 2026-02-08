<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class AreaUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Square Meter (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Meter',
                    'code'        => 'm²',
                    'position'    => 'left',
                    'description' => 'The square meter is the SI derived unit of area.',
                ],
                'fa' => [
                    'name'        => 'متر مربع',
                    'code'        => 'متر مربع',
                    'position'    => 'right',
                    'description' => 'متر مربع واحد مشتق‌شده SI برای مساحت است.',
                ],
            ],
        ]);

        // Square Centimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 0.0001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Centimeter',
                    'code'        => 'cm²',
                    'position'    => 'left',
                    'description' => 'A square centimeter is a unit of area.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌متر مربع',
                    'code'        => 'سانتی‌متر مربع',
                    'position'    => 'right',
                    'description' => 'سانتی‌متر مربع یک واحد مساحت است.',
                ],
            ],
        ]);

        // Square Kilometer
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Kilometer',
                    'code'        => 'km²',
                    'position'    => 'left',
                    'description' => 'A square kilometer is a unit of area equal to 1,000,000 square meters.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر مربع',
                    'code'        => 'کیلومتر مربع',
                    'position'    => 'right',
                    'description' => 'کیلومتر مربع یک واحد مساحت برابر با ۱،۰۰۰،۰۰۰ متر مربع است.',
                ],
            ],
        ]);

        // Hectare
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 10000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Hectare',
                    'code'        => 'ha',
                    'position'    => 'left',
                    'description' => 'The hectare is a unit of area equal to 10,000 square meters.',
                ],
                'fa' => [
                    'name'        => 'هکتار',
                    'code'        => 'هکتار',
                    'position'    => 'right',
                    'description' => 'هکتار یک واحد مساحت برابر با ۱۰،۰۰۰ متر مربع است.',
                ],
            ],
        ]);

        // Are
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 100,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Are',
                    'code'        => 'a',
                    'position'    => 'left',
                    'description' => 'The are is a unit of area equal to 100 square meters.',
                ],
                'fa' => [
                    'name'        => 'آر',
                    'code'        => 'آر',
                    'position'    => 'right',
                    'description' => 'آر یک واحد مساحت برابر با ۱۰۰ متر مربع است.',
                ],
            ],
        ]);

        // Acre
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 4046.86,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Acre',
                    'code'        => 'ac',
                    'position'    => 'left',
                    'description' => 'The acre is a unit of land area used in the imperial and US customary systems.',
                ],
                'fa' => [
                    'name'        => 'جریب (آمریکایی)',
                    'code'        => 'جریب',
                    'position'    => 'right',
                    'description' => 'جریب آمریکایی یک واحد مساحت زمین در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);

        // Square Foot
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 0.092903,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Foot',
                    'code'        => 'ft²',
                    'position'    => 'left',
                    'description' => 'A square foot is a unit of area used in the imperial and US customary systems.',
                ],
                'fa' => [
                    'name'        => 'فوت مربع',
                    'code'        => 'فوت مربع',
                    'position'    => 'right',
                    'description' => 'فوت مربع یک واحد مساحت در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);

        // Square Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 0.00064516,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Inch',
                    'code'        => 'in²',
                    'position'    => 'left',
                    'description' => 'A square inch is a unit of area.',
                ],
                'fa' => [
                    'name'        => 'اینچ مربع',
                    'code'        => 'اینچ مربع',
                    'position'    => 'right',
                    'description' => 'اینچ مربع یک واحد مساحت است.',
                ],
            ],
        ]);

        // Square Yard
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 0.836127,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Yard',
                    'code'        => 'yd²',
                    'position'    => 'left',
                    'description' => 'A square yard is a unit of area.',
                ],
                'fa' => [
                    'name'        => 'یارد مربع',
                    'code'        => 'یارد مربع',
                    'position'    => 'right',
                    'description' => 'یارد مربع یک واحد مساحت است.',
                ],
            ],
        ]);

        // Square Mile
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 2589988.11,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Mile',
                    'code'        => 'mi²',
                    'position'    => 'left',
                    'description' => 'A square mile is a unit of area.',
                ],
                'fa' => [
                    'name'        => 'مایل مربع',
                    'code'        => 'مایل مربع',
                    'position'    => 'right',
                    'description' => 'مایل مربع یک واحد مساحت است.',
                ],
            ],
        ]);

        // Square Millimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Millimeter',
                    'code'        => 'mm²',
                    'position'    => 'left',
                    'description' => 'A square millimeter is a unit of area.',
                ],
                'fa' => [
                    'name'        => 'میلی‌متر مربع',
                    'code'        => 'میلی‌متر مربع',
                    'position'    => 'right',
                    'description' => 'میلی‌متر مربع یک واحد مساحت است.',
                ],
            ],
        ]);

        // Dunam (Middle Eastern unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::AREA(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dunam',
                    'code'        => 'dunam',
                    'position'    => 'left',
                    'description' => 'The dunam is a unit of land area used in the Middle East.',
                ],
                'fa' => [
                    'name'        => 'دونم',
                    'code'        => 'دونم',
                    'position'    => 'right',
                    'description' => 'دونم یک واحد مساحت زمین است که در خاورمیانه استفاده می‌شود.',
                ],
            ],
        ]);
    }
}

