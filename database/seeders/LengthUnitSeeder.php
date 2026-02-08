<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class LengthUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Meter
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Meter',
                    'code'        => 'm',
                    'position'    => 'left',
                    'description' => 'The meter is the base unit of length in the International System of Units.',
                ],
                'fa' => [
                    'name'        => 'متر',
                    'code'        => 'متر',
                    'position'    => 'right',
                    'description' => 'متر واحد پایه طول در سیستم بین‌المللی واحدها است.',
                ],
            ],
        ]);

        // Centimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centimeter',
                    'code'        => 'cm',
                    'position'    => 'left',
                    'description' => 'The centimeter is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌متر',
                    'code'        => 'سانتی‌متر',
                    'position'    => 'right',
                    'description' => 'سانتی‌متر یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Kilometer
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilometer',
                    'code'        => 'km',
                    'position'    => 'left',
                    'description' => 'The kilometer is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر',
                    'code'        => 'کیلومتر',
                    'position'    => 'right',
                    'description' => 'کیلومتر یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.0254,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Inch',
                    'code'        => 'in',
                    'position'    => 'left',
                    'description' => 'The inch is a unit of length in the imperial and United States customary systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'اینچ',
                    'code'        => 'اینچ',
                    'position'    => 'right',
                    'description' => 'اینچ یک واحد طول در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);

        // Foot - Feet
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.3048,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot',
                    'code'        => 'ft',
                    'position'    => 'left',
                    'description' => 'The foot is a unit of length in the imperial and US customary systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'فوت',
                    'code'        => 'فوت',
                    'position'    => 'right',
                    'description' => 'فوت یک واحد طول در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);

        // Yard
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.9144,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Yard',
                    'code'        => 'yd',
                    'position'    => 'left',
                    'description' => 'The yard is a unit of length in the imperial and US customary systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'یارد',
                    'code'        => 'یارد',
                    'position'    => 'right',
                    'description' => 'یارد یک واحد طول در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);

        // Mile
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 1609.34,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mile',
                    'code'        => 'mi',
                    'position'    => 'left',
                    'description' => 'The mile is a unit of length in the imperial and US customary systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'مایل',
                    'code'        => 'مایل',
                    'position'    => 'right',
                    'description' => 'مایل یک واحد طول در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);

        // Nautical Mile
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 1852,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nautical Mile',
                    'code'        => 'nmi',
                    'position'    => 'left',
                    'description' => 'The nautical mile is a unit of length used in air and marine navigation.',
                ],
                'fa' => [
                    'name'        => 'مایل دریایی',
                    'code'        => 'مایل دریایی',
                    'position'    => 'right',
                    'description' => 'مایل دریایی یک واحد طول است که در ناوبری هوایی و دریایی استفاده می‌شود.',
                ],
            ],
        ]);

        // Point
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.000352778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Point',
                    'code'        => 'pt',
                    'position'    => 'left',
                    'description' => 'The point is a unit of length used in typography.',
                ],
                'fa' => [
                    'name'        => 'پوینت',
                    'code'        => 'پوینت',
                    'position'    => 'right',
                    'description' => 'پوینت یک واحد طول است که در تایپوگرافی استفاده می‌شود.',
                ],
            ],
        ]);

        // Decimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Decimeter',
                    'code'        => 'dm',
                    'position'    => 'left',
                    'description' => 'The decimeter is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'دسی‌متر',
                    'code'        => 'دسی‌متر',
                    'position'    => 'right',
                    'description' => 'دسی‌متر یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Micron
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Micron',
                    'code'        => 'µm',
                    'position'    => 'left',
                    'description' => 'The micron is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'میکرون',
                    'code'        => 'میکرون',
                    'position'    => 'right',
                    'description' => 'میکرون یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Millimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millimeter',
                    'code'        => 'mm',
                    'position'    => 'left',
                    'description' => 'The millimeter is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'میلی‌متر',
                    'code'        => 'میلی‌متر',
                    'position'    => 'right',
                    'description' => 'میلی‌متر یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Micrometer
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Micrometer',
                    'code'        => 'µm',
                    'position'    => 'left',
                    'description' => 'The micrometer is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'میکرومتر',
                    'code'        => 'میکرومتر',
                    'position'    => 'right',
                    'description' => 'میکرومتر یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Nanometer
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nanometer',
                    'code'        => 'nm',
                    'position'    => 'left',
                    'description' => 'The nanometer is a unit of length in the metric system.',
                ],
                'fa' => [
                    'name'        => 'نانومتر',
                    'code'        => 'نانومتر',
                    'position'    => 'right',
                    'description' => 'نانومتر یک واحد طول در سیستم متریک است.',
                ],
            ],
        ]);

        // Chain
        UnitConverter::store([
            'type'        => UnitTypeEnum::LENGTH(),
            'value'       => 20.1168,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Chain',
                    'code'        => 'ch',
                    'position'    => 'left',
                    'description' => 'The chain is a unit of length in the imperial and US customary systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'زنجیر',
                    'code'        => 'زنجیر',
                    'position'    => 'right',
                    'description' => 'زنجیر یک واحد طول در سیستم‌های اندازه‌گیری امپریال و آمریکا است.',
                ],
            ],
        ]);
    }
}
