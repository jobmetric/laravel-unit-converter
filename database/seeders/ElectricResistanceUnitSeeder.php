<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ElectricResistanceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ohm (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ohm',
                    'code'        => 'Ω',
                    'position'    => 'left',
                    'description' => 'The ohm is the SI derived unit of electrical resistance.',
                ],
                'fa' => [
                    'name'        => 'اهم',
                    'code'        => 'Ω',
                    'position'    => 'right',
                    'description' => 'اهم واحد مشتق‌شده SI برای مقاومت الکتریکی است.',
                ],
            ],
        ]);

        // Milliohm
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliohm',
                    'code'        => 'mΩ',
                    'position'    => 'left',
                    'description' => 'A milliohm is one thousandth of an ohm.',
                ],
                'fa' => [
                    'name'        => 'میلی‌اهم',
                    'code'        => 'mΩ',
                    'position'    => 'right',
                    'description' => 'میلی‌اهم یک هزارم اهم است.',
                ],
            ],
        ]);

        // Microohm
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microohm',
                    'code'        => 'µΩ',
                    'position'    => 'left',
                    'description' => 'A microohm is one millionth of an ohm.',
                ],
                'fa' => [
                    'name'        => 'میکرواهم',
                    'code'        => 'µΩ',
                    'position'    => 'right',
                    'description' => 'میکرواهم یک میلیونم اهم است.',
                ],
            ],
        ]);

        // Kiloohm
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kiloohm',
                    'code'        => 'kΩ',
                    'position'    => 'left',
                    'description' => 'A kiloohm is 1,000 ohms.',
                ],
                'fa' => [
                    'name'        => 'کیلواهم',
                    'code'        => 'kΩ',
                    'position'    => 'right',
                    'description' => 'کیلواهم برابر با ۱۰۰۰ اهم است.',
                ],
            ],
        ]);

        // Megaohm
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megaohm',
                    'code'        => 'MΩ',
                    'position'    => 'left',
                    'description' => 'A megaohm is 1,000,000 ohms.',
                ],
                'fa' => [
                    'name'        => 'مگااهم',
                    'code'        => 'MΩ',
                    'position'    => 'right',
                    'description' => 'مگااهم برابر با ۱،۰۰۰،۰۰۰ اهم است.',
                ],
            ],
        ]);

        // Gigaohm
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigaohm',
                    'code'        => 'GΩ',
                    'position'    => 'left',
                    'description' => 'A gigaohm is 1,000,000,000 ohms.',
                ],
                'fa' => [
                    'name'        => 'گیگااهم',
                    'code'        => 'GΩ',
                    'position'    => 'right',
                    'description' => 'گیگااهم برابر با ۱،۰۰۰،۰۰۰،۰۰۰ اهم است.',
                ],
            ],
        ]);

        // Abohm (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_RESISTANCE(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Abohm',
                    'code'        => 'abΩ',
                    'position'    => 'left',
                    'description' => 'The abohm is the CGS electromagnetic unit of resistance.',
                ],
                'fa' => [
                    'name'        => 'آب‌اهم',
                    'code'        => 'abΩ',
                    'position'    => 'right',
                    'description' => 'آب‌اهم واحد مقاومت الکترومغناطیسی CGS است.',
                ],
            ],
        ]);
    }
}

