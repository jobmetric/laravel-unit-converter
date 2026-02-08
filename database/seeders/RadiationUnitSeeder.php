<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class RadiationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Becquerel (base unit for radioactivity)
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Becquerel',
                    'code'        => 'Bq',
                    'position'    => 'left',
                    'description' => 'The becquerel is the SI derived unit of radioactivity.',
                ],
                'fa' => [
                    'name'        => 'بکرل',
                    'code'        => 'Bq',
                    'position'    => 'right',
                    'description' => 'بکرل واحد مشتق‌شده SI برای رادیواکتیویته است.',
                ],
            ],
        ]);

        // Kilobecquerel
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilobecquerel',
                    'code'        => 'kBq',
                    'position'    => 'left',
                    'description' => 'A kilobecquerel is 1,000 becquerels.',
                ],
                'fa' => [
                    'name'        => 'کیلوبکرل',
                    'code'        => 'kBq',
                    'position'    => 'right',
                    'description' => 'کیلوبکرل برابر با ۱۰۰۰ بکرل است.',
                ],
            ],
        ]);

        // Megabecquerel
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megabecquerel',
                    'code'        => 'MBq',
                    'position'    => 'left',
                    'description' => 'A megabecquerel is 1,000,000 becquerels.',
                ],
                'fa' => [
                    'name'        => 'مگابکرل',
                    'code'        => 'MBq',
                    'position'    => 'right',
                    'description' => 'مگابکرل برابر با ۱،۰۰۰،۰۰۰ بکرل است.',
                ],
            ],
        ]);

        // Gigabecquerel
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigabecquerel',
                    'code'        => 'GBq',
                    'position'    => 'left',
                    'description' => 'A gigabecquerel is 1,000,000,000 becquerels.',
                ],
                'fa' => [
                    'name'        => 'گیگابکرل',
                    'code'        => 'GBq',
                    'position'    => 'right',
                    'description' => 'گیگابکرل برابر با ۱،۰۰۰،۰۰۰،۰۰۰ بکرل است.',
                ],
            ],
        ]);

        // Microcurie
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 37000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microcurie',
                    'code'        => 'µCi',
                    'position'    => 'left',
                    'description' => 'A microcurie is one millionth of a curie.',
                ],
                'fa' => [
                    'name'        => 'میکروکوری',
                    'code'        => 'µCi',
                    'position'    => 'right',
                    'description' => 'میکروکوری یک میلیونم کوری است.',
                ],
            ],
        ]);

        // Gray (absorbed dose)
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gray',
                    'code'        => 'Gy',
                    'position'    => 'left',
                    'description' => 'The gray is the SI derived unit of absorbed radiation dose.',
                ],
                'fa' => [
                    'name'        => 'گری',
                    'code'        => 'Gy',
                    'position'    => 'right',
                    'description' => 'گری واحد مشتق‌شده SI برای دوز جذب‌شده تابش است.',
                ],
            ],
        ]);

        // Sievert (equivalent dose)
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 1.00002,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Sievert',
                    'code'        => 'Sv',
                    'position'    => 'left',
                    'description' => 'The sievert is the SI derived unit of equivalent radiation dose.',
                ],
                'fa' => [
                    'name'        => 'سیورت',
                    'code'        => 'Sv',
                    'position'    => 'right',
                    'description' => 'سیورت واحد مشتق‌شده SI برای دوز معادل تابش است.',
                ],
            ],
        ]);

        // Millisievert
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millisievert',
                    'code'        => 'mSv',
                    'position'    => 'left',
                    'description' => 'A millisievert is one thousandth of a sievert.',
                ],
                'fa' => [
                    'name'        => 'میلی‌سیورت',
                    'code'        => 'mSv',
                    'position'    => 'right',
                    'description' => 'میلی‌سیورت یک هزارم سیورت است.',
                ],
            ],
        ]);

        // Rad
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Rad',
                    'code'        => 'rad',
                    'position'    => 'left',
                    'description' => 'The rad is a CGS unit of absorbed radiation dose.',
                ],
                'fa' => [
                    'name'        => 'راد',
                    'code'        => 'rad',
                    'position'    => 'right',
                    'description' => 'راد یک واحد CGS برای دوز جذب‌شده تابش است.',
                ],
            ],
        ]);

        // Rem
        UnitConverter::store([
            'type'        => UnitTypeEnum::RADIATION(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Rem',
                    'code'        => 'rem',
                    'position'    => 'left',
                    'description' => 'The rem is a CGS unit of equivalent radiation dose.',
                ],
                'fa' => [
                    'name'        => 'رم',
                    'code'        => 'rem',
                    'position'    => 'right',
                    'description' => 'رم یک واحد CGS برای دوز معادل تابش است.',
                ],
            ],
        ]);
    }
}
