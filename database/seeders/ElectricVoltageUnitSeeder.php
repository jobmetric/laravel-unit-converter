<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ElectricVoltageUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Volt (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Volt',
                    'code'        => 'V',
                    'position'    => 'left',
                    'description' => 'The volt is the SI derived unit of electric potential.',
                ],
                'fa' => [
                    'name'        => 'ولت',
                    'code'        => 'V',
                    'position'    => 'right',
                    'description' => 'ولت واحد مشتق‌شده SI برای پتانسیل الکتریکی است.',
                ],
            ],
        ]);

        // Millivolt
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millivolt',
                    'code'        => 'mV',
                    'position'    => 'left',
                    'description' => 'A millivolt is one thousandth of a volt.',
                ],
                'fa' => [
                    'name'        => 'میلی‌ولت',
                    'code'        => 'mV',
                    'position'    => 'right',
                    'description' => 'میلی‌ولت یک هزارم ولت است.',
                ],
            ],
        ]);

        // Microvolt
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microvolt',
                    'code'        => 'µV',
                    'position'    => 'left',
                    'description' => 'A microvolt is one millionth of a volt.',
                ],
                'fa' => [
                    'name'        => 'میکروولت',
                    'code'        => 'µV',
                    'position'    => 'right',
                    'description' => 'میکروولت یک میلیونم ولت است.',
                ],
            ],
        ]);

        // Kilovolt
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilovolt',
                    'code'        => 'kV',
                    'position'    => 'left',
                    'description' => 'A kilovolt is 1,000 volts.',
                ],
                'fa' => [
                    'name'        => 'کیلوولت',
                    'code'        => 'kV',
                    'position'    => 'right',
                    'description' => 'کیلوولت برابر با ۱۰۰۰ ولت است.',
                ],
            ],
        ]);

        // Megavolt
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megavolt',
                    'code'        => 'MV',
                    'position'    => 'left',
                    'description' => 'A megavolt is 1,000,000 volts.',
                ],
                'fa' => [
                    'name'        => 'مگاولت',
                    'code'        => 'MV',
                    'position'    => 'right',
                    'description' => 'مگاولت برابر با ۱،۰۰۰،۰۰۰ ولت است.',
                ],
            ],
        ]);

        // Nanovolt
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nanovolt',
                    'code'        => 'nV',
                    'position'    => 'left',
                    'description' => 'A nanovolt is one billionth of a volt.',
                ],
                'fa' => [
                    'name'        => 'نانوولت',
                    'code'        => 'nV',
                    'position'    => 'right',
                    'description' => 'نانوولت یک میلیاردم ولت است.',
                ],
            ],
        ]);

        // Abvolt (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 0.00000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Abvolt',
                    'code'        => 'abV',
                    'position'    => 'left',
                    'description' => 'The abvolt is the CGS electromagnetic unit of voltage.',
                ],
                'fa' => [
                    'name'        => 'آب‌ولت',
                    'code'        => 'abV',
                    'position'    => 'right',
                    'description' => 'آب‌ولت واحد ولتاژ الکترومغناطیسی CGS است.',
                ],
            ],
        ]);

        // Statvolt (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_VOLTAGE(),
            'value'       => 299.792,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Statvolt',
                    'code'        => 'statV',
                    'position'    => 'left',
                    'description' => 'The statvolt is the CGS electrostatic unit of voltage.',
                ],
                'fa' => [
                    'name'        => 'استات‌ولت',
                    'code'        => 'statV',
                    'position'    => 'right',
                    'description' => 'استات‌ولت واحد ولتاژ الکترواستاتیکی CGS است.',
                ],
            ],
        ]);
    }
}

