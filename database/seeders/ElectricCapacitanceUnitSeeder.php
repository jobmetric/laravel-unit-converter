<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ElectricCapacitanceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Farad (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Farad',
                    'code'        => 'F',
                    'position'    => 'left',
                    'description' => 'The farad is the SI derived unit of electrical capacitance.',
                ],
                'fa' => [
                    'name'        => 'فاراد',
                    'code'        => 'F',
                    'position'    => 'right',
                    'description' => 'فاراد واحد مشتق‌شده SI برای ظرفیت الکتریکی است.',
                ],
            ],
        ]);

        // Millifarad
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millifarad',
                    'code'        => 'mF',
                    'position'    => 'left',
                    'description' => 'A millifarad is one thousandth of a farad.',
                ],
                'fa' => [
                    'name'        => 'میلی‌فاراد',
                    'code'        => 'mF',
                    'position'    => 'right',
                    'description' => 'میلی‌فاراد یک هزارم فاراد است.',
                ],
            ],
        ]);

        // Microfarad
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microfarad',
                    'code'        => 'µF',
                    'position'    => 'left',
                    'description' => 'A microfarad is one millionth of a farad.',
                ],
                'fa' => [
                    'name'        => 'میکروفاراد',
                    'code'        => 'µF',
                    'position'    => 'right',
                    'description' => 'میکروفاراد یک میلیونم فاراد است.',
                ],
            ],
        ]);

        // Nanofarad
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nanofarad',
                    'code'        => 'nF',
                    'position'    => 'left',
                    'description' => 'A nanofarad is one billionth of a farad.',
                ],
                'fa' => [
                    'name'        => 'نانوفاراد',
                    'code'        => 'nF',
                    'position'    => 'right',
                    'description' => 'نانوفاراد یک میلیاردم فاراد است.',
                ],
            ],
        ]);

        // Picofarad
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 0.000000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Picofarad',
                    'code'        => 'pF',
                    'position'    => 'left',
                    'description' => 'A picofarad is one trillionth of a farad.',
                ],
                'fa' => [
                    'name'        => 'پیکوفاراد',
                    'code'        => 'pF',
                    'position'    => 'right',
                    'description' => 'پیکوفاراد یک تریلیونم فاراد است.',
                ],
            ],
        ]);

        // Kilofarad
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilofarad',
                    'code'        => 'kF',
                    'position'    => 'left',
                    'description' => 'A kilofarad is 1,000 farads.',
                ],
                'fa' => [
                    'name'        => 'کیلوفاراد',
                    'code'        => 'kF',
                    'position'    => 'right',
                    'description' => 'کیلوفاراد برابر با ۱۰۰۰ فاراد است.',
                ],
            ],
        ]);

        // Abfarad (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Abfarad',
                    'code'        => 'abF',
                    'position'    => 'left',
                    'description' => 'The abfarad is the CGS electromagnetic unit of capacitance.',
                ],
                'fa' => [
                    'name'        => 'آب‌فاراد',
                    'code'        => 'abF',
                    'position'    => 'right',
                    'description' => 'آب‌فاراد واحد ظرفیت الکترومغناطیسی CGS است.',
                ],
            ],
        ]);

        // Statfarad (CGS unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ELECTRIC_CAPACITANCE(),
            'value'       => 1.11265e-12,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Statfarad',
                    'code'        => 'statF',
                    'position'    => 'left',
                    'description' => 'The statfarad is the CGS electrostatic unit of capacitance.',
                ],
                'fa' => [
                    'name'        => 'استات‌فاراد',
                    'code'        => 'statF',
                    'position'    => 'right',
                    'description' => 'استات‌فاراد واحد ظرفیت الکترواستاتیکی CGS است.',
                ],
            ],
        ]);
    }
}

