<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class DensityUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kilogram per Cubic Meter (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Cubic Meter',
                    'code'        => 'kg/m³',
                    'position'    => 'left',
                    'description' => 'The kilogram per cubic meter is the SI derived unit of density.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر متر مکعب',
                    'code'        => 'kg/m³',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر متر مکعب واحد مشتق‌شده SI برای چگالی است.',
                ],
            ],
        ]);

        // Gram per Cubic Centimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram per Cubic Centimeter',
                    'code'        => 'g/cm³',
                    'position'    => 'left',
                    'description' => 'A gram per cubic centimeter equals 1,000 kg/m³.',
                ],
                'fa' => [
                    'name'        => 'گرم بر سانتی‌متر مکعب',
                    'code'        => 'g/cm³',
                    'position'    => 'right',
                    'description' => 'گرم بر سانتی‌متر مکعب برابر با ۱۰۰۰ کیلوگرم بر متر مکعب است.',
                ],
            ],
        ]);

        // Gram per Liter (equal to kg/m³)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram per Liter',
                    'code'        => 'g/L',
                    'position'    => 'left',
                    'description' => 'A gram per liter is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'گرم بر لیتر',
                    'code'        => 'g/L',
                    'position'    => 'right',
                    'description' => 'گرم بر لیتر یک واحد چگالی است.',
                ],
            ],
        ]);

        // Kilogram per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Liter',
                    'code'        => 'kg/L',
                    'position'    => 'left',
                    'description' => 'A kilogram per liter is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر لیتر',
                    'code'        => 'kg/L',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر لیتر یک واحد چگالی است.',
                ],
            ],
        ]);

        // Milligram per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milligram per Liter',
                    'code'        => 'mg/L',
                    'position'    => 'left',
                    'description' => 'A milligram per liter is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'میلی‌گرم بر لیتر',
                    'code'        => 'mg/L',
                    'position'    => 'right',
                    'description' => 'میلی‌گرم بر لیتر یک واحد چگالی است.',
                ],
            ],
        ]);

        // Pound per Cubic Foot
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 16.0185,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Cubic Foot',
                    'code'        => 'lb/ft³',
                    'position'    => 'left',
                    'description' => 'A pound per cubic foot is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'پوند بر فوت مکعب',
                    'code'        => 'lb/ft³',
                    'position'    => 'right',
                    'description' => 'پوند بر فوت مکعب یک واحد چگالی است.',
                ],
            ],
        ]);

        // Pound per Cubic Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 27679.9,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Cubic Inch',
                    'code'        => 'lb/in³',
                    'position'    => 'left',
                    'description' => 'A pound per cubic inch is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'پوند بر اینچ مکعب',
                    'code'        => 'lb/in³',
                    'position'    => 'right',
                    'description' => 'پوند بر اینچ مکعب یک واحد چگالی است.',
                ],
            ],
        ]);

        // Ounce per Cubic Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 1729.99,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ounce per Cubic Inch',
                    'code'        => 'oz/in³',
                    'position'    => 'left',
                    'description' => 'An ounce per cubic inch is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'اونس بر اینچ مکعب',
                    'code'        => 'oz/in³',
                    'position'    => 'right',
                    'description' => 'اونس بر اینچ مکعب یک واحد چگالی است.',
                ],
            ],
        ]);

        // Pound per Gallon (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 119.826,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Gallon (US)',
                    'code'        => 'lb/gal',
                    'position'    => 'left',
                    'description' => 'A pound per US gallon is a unit of density.',
                ],
                'fa' => [
                    'name'        => 'پوند بر گالن (آمریکایی)',
                    'code'        => 'lb/gal',
                    'position'    => 'right',
                    'description' => 'پوند بر گالن آمریکایی یک واحد چگالی است.',
                ],
            ],
        ]);

        // Gram per Milliliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::DENSITY(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram per Milliliter',
                    'code'        => 'g/mL',
                    'position'    => 'left',
                    'description' => 'A gram per milliliter is a unit of density equal to g/cm³.',
                ],
                'fa' => [
                    'name'        => 'گرم بر میلی‌لیتر',
                    'code'        => 'g/mL',
                    'position'    => 'right',
                    'description' => 'گرم بر میلی‌لیتر یک واحد چگالی برابر با g/cm³ است.',
                ],
            ],
        ]);
    }
}

