<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ElectricCurrentUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ampere (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ampere',
                    'code'        => 'A',
                    'position'    => 'left',
                    'description' => 'The ampere is the SI base unit of electric current.',
                ],
                'fa' => [
                    'name'        => 'آمپر',
                    'code'        => 'A',
                    'position'    => 'right',
                    'description' => 'آمپر واحد پایه SI برای جریان الکتریکی است.',
                ],
            ],
        ]);

        // Milliampere
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliampere',
                    'code'        => 'mA',
                    'position'    => 'left',
                    'description' => 'A milliampere is one thousandth of an ampere.',
                ],
                'fa' => [
                    'name'        => 'میلی‌آمپر',
                    'code'        => 'mA',
                    'position'    => 'right',
                    'description' => 'میلی‌آمپر یک هزارم آمپر است.',
                ],
            ],
        ]);

        // Microampere
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microampere',
                    'code'        => 'µA',
                    'position'    => 'left',
                    'description' => 'A microampere is one millionth of an ampere.',
                ],
                'fa' => [
                    'name'        => 'میکروآمپر',
                    'code'        => 'µA',
                    'position'    => 'right',
                    'description' => 'میکروآمپر یک میلیونم آمپر است.',
                ],
            ],
        ]);

        // Nanoampere
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nanoampere',
                    'code'        => 'nA',
                    'position'    => 'left',
                    'description' => 'A nanoampere is one billionth of an ampere.',
                ],
                'fa' => [
                    'name'        => 'نانوآمپر',
                    'code'        => 'nA',
                    'position'    => 'right',
                    'description' => 'نانوآمپر یک میلیاردم آمپر است.',
                ],
            ],
        ]);

        // Kiloampere
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kiloampere',
                    'code'        => 'kA',
                    'position'    => 'left',
                    'description' => 'A kiloampere is 1,000 amperes.',
                ],
                'fa' => [
                    'name'        => 'کیلوآمپر',
                    'code'        => 'kA',
                    'position'    => 'right',
                    'description' => 'کیلوآمپر برابر با ۱۰۰۰ آمپر است.',
                ],
            ],
        ]);

        // Abampere (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 10,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Abampere',
                    'code'        => 'abA',
                    'position'    => 'left',
                    'description' => 'The abampere is the CGS electromagnetic unit of current.',
                ],
                'fa' => [
                    'name'        => 'آب‌آمپر',
                    'code'        => 'abA',
                    'position'    => 'right',
                    'description' => 'آب‌آمپر واحد جریان الکترومغناطیسی CGS است.',
                ],
            ],
        ]);

        // Statampere (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 3.33564e-10,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Statampere',
                    'code'        => 'statA',
                    'position'    => 'left',
                    'description' => 'The statampere is the CGS electrostatic unit of current.',
                ],
                'fa' => [
                    'name'        => 'استات‌آمپر',
                    'code'        => 'statA',
                    'position'    => 'right',
                    'description' => 'استات‌آمپر واحد جریان الکترواستاتیکی CGS است.',
                ],
            ],
        ]);

        // Biot
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CURRENT(),
            'value'       => 10,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Biot',
                    'code'        => 'Bi',
                    'position'    => 'left',
                    'description' => 'The biot is a unit of electric current equal to 10 amperes.',
                ],
                'fa' => [
                    'name'        => 'بیوت',
                    'code'        => 'Bi',
                    'position'    => 'right',
                    'description' => 'بیوت یک واحد جریان الکتریکی برابر با ۱۰ آمپر است.',
                ],
            ],
        ]);
    }
}

