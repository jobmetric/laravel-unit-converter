<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class PressureUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pascal (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pascal',
                    'code'        => 'Pa',
                    'position'    => 'left',
                    'description' => 'The pascal is the SI derived unit of pressure.',
                ],
                'fa' => [
                    'name'        => 'پاسکال',
                    'code'        => 'Pa',
                    'position'    => 'right',
                    'description' => 'پاسکال واحد مشتق‌شده SI برای فشار است.',
                ],
            ],
        ]);

        // Kilopascal
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilopascal',
                    'code'        => 'kPa',
                    'position'    => 'left',
                    'description' => 'A kilopascal is 1,000 pascals.',
                ],
                'fa' => [
                    'name'        => 'کیلوپاسکال',
                    'code'        => 'kPa',
                    'position'    => 'right',
                    'description' => 'کیلوپاسکال برابر با ۱۰۰۰ پاسکال است.',
                ],
            ],
        ]);

        // Megapascal
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megapascal',
                    'code'        => 'MPa',
                    'position'    => 'left',
                    'description' => 'A megapascal is 1,000,000 pascals.',
                ],
                'fa' => [
                    'name'        => 'مگاپاسکال',
                    'code'        => 'MPa',
                    'position'    => 'right',
                    'description' => 'مگاپاسکال برابر با ۱،۰۰۰،۰۰۰ پاسکال است.',
                ],
            ],
        ]);

        // Bar
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 100000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Bar',
                    'code'        => 'bar',
                    'position'    => 'left',
                    'description' => 'The bar is a metric unit of pressure.',
                ],
                'fa' => [
                    'name'        => 'بار',
                    'code'        => 'بار',
                    'position'    => 'right',
                    'description' => 'بار یک واحد متریک فشار است.',
                ],
            ],
        ]);

        // Millibar
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 100,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millibar',
                    'code'        => 'mbar',
                    'position'    => 'left',
                    'description' => 'A millibar is one thousandth of a bar.',
                ],
                'fa' => [
                    'name'        => 'میلی‌بار',
                    'code'        => 'میلی‌بار',
                    'position'    => 'right',
                    'description' => 'میلی‌بار یک هزارم بار است.',
                ],
            ],
        ]);

        // Atmosphere
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 101325,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Atmosphere',
                    'code'        => 'atm',
                    'position'    => 'left',
                    'description' => 'The standard atmosphere is a unit of pressure.',
                ],
                'fa' => [
                    'name'        => 'اتمسفر',
                    'code'        => 'atm',
                    'position'    => 'right',
                    'description' => 'اتمسفر استاندارد یک واحد فشار است.',
                ],
            ],
        ]);

        // Torr (mmHg)
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 133.322,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Torr',
                    'code'        => 'Torr',
                    'position'    => 'left',
                    'description' => 'The torr is a unit of pressure, approximately equal to 1 mmHg.',
                ],
                'fa' => [
                    'name'        => 'تور',
                    'code'        => 'تور',
                    'position'    => 'right',
                    'description' => 'تور یک واحد فشار است که تقریباً برابر با ۱ میلی‌متر جیوه است.',
                ],
            ],
        ]);

        // Millimeter of Mercury
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 133.322,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millimeter of Mercury',
                    'code'        => 'mmHg',
                    'position'    => 'left',
                    'description' => 'Millimeter of mercury is a unit of pressure.',
                ],
                'fa' => [
                    'name'        => 'میلی‌متر جیوه',
                    'code'        => 'mmHg',
                    'position'    => 'right',
                    'description' => 'میلی‌متر جیوه یک واحد فشار است.',
                ],
            ],
        ]);

        // Pound per Square Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 6894.76,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Square Inch',
                    'code'        => 'psi',
                    'position'    => 'left',
                    'description' => 'The pound per square inch is a unit of pressure.',
                ],
                'fa' => [
                    'name'        => 'پوند بر اینچ مربع',
                    'code'        => 'psi',
                    'position'    => 'right',
                    'description' => 'پوند بر اینچ مربع یک واحد فشار است.',
                ],
            ],
        ]);

        // Inch of Mercury
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 3386.39,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Inch of Mercury',
                    'code'        => 'inHg',
                    'position'    => 'left',
                    'description' => 'Inch of mercury is a unit of pressure.',
                ],
                'fa' => [
                    'name'        => 'اینچ جیوه',
                    'code'        => 'inHg',
                    'position'    => 'right',
                    'description' => 'اینچ جیوه یک واحد فشار است.',
                ],
            ],
        ]);

        // Hectopascal
        UnitConverter::store([
            'type'        => UnitTypeEnum::PRESSURE(),
            'value'       => 100,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Hectopascal',
                    'code'        => 'hPa',
                    'position'    => 'left',
                    'description' => 'A hectopascal is 100 pascals, commonly used in meteorology.',
                ],
                'fa' => [
                    'name'        => 'هکتوپاسکال',
                    'code'        => 'hPa',
                    'position'    => 'right',
                    'description' => 'هکتوپاسکال برابر با ۱۰۰ پاسکال است و معمولاً در هواشناسی استفاده می‌شود.',
                ],
            ],
        ]);
    }
}

