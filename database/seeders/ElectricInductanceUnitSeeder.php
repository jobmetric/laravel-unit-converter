<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ElectricInductanceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Henry (base unit)
        UnitConverter::store([
            'type' => UnitTypeEnum::ELECTRIC_INDUCTANCE(),
            'value' => 1,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Henry',
                    'code' => 'H',
                    'position' => 'left',
                    'description' => 'The henry is the SI derived unit of electrical inductance.',
                ],
                'fa' => [
                    'name' => 'هانری',
                    'code' => 'H',
                    'position' => 'right',
                    'description' => 'هانری واحد مشتق‌شده SI برای اندوکتانس الکتریکی است.',
                ],
            ],
        ]);

        // Millihenry
        UnitConverter::store([
            'type' => UnitTypeEnum::ELECTRIC_INDUCTANCE(),
            'value' => 0.001,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Millihenry',
                    'code' => 'mH',
                    'position' => 'left',
                    'description' => 'A millihenry is one thousandth of a henry.',
                ],
                'fa' => [
                    'name' => 'میلی‌هانری',
                    'code' => 'mH',
                    'position' => 'right',
                    'description' => 'میلی‌هانری یک هزارم هانری است.',
                ],
            ],
        ]);

        // Microhenry
        UnitConverter::store([
            'type' => UnitTypeEnum::ELECTRIC_INDUCTANCE(),
            'value' => 0.000001,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Microhenry',
                    'code' => 'µH',
                    'position' => 'left',
                    'description' => 'A microhenry is one millionth of a henry.',
                ],
                'fa' => [
                    'name' => 'میکروهانری',
                    'code' => 'µH',
                    'position' => 'right',
                    'description' => 'میکروهانری یک میلیونم هانری است.',
                ],
            ],
        ]);

        // Nanohenry
        UnitConverter::store([
            'type' => UnitTypeEnum::ELECTRIC_INDUCTANCE(),
            'value' => 0.000000001,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Nanohenry',
                    'code' => 'nH',
                    'position' => 'left',
                    'description' => 'A nanohenry is one billionth of a henry.',
                ],
                'fa' => [
                    'name' => 'نانوهانری',
                    'code' => 'nH',
                    'position' => 'right',
                    'description' => 'نانوهانری یک میلیاردم هانری است.',
                ],
            ],
        ]);

        // Kilohenry
        UnitConverter::store([
            'type' => UnitTypeEnum::ELECTRIC_INDUCTANCE(),
            'value' => 1000,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Kilohenry',
                    'code' => 'kH',
                    'position' => 'left',
                    'description' => 'A kilohenry is 1,000 henrys.',
                ],
                'fa' => [
                    'name' => 'کیلوهانری',
                    'code' => 'kH',
                    'position' => 'right',
                    'description' => 'کیلوهانری برابر با ۱۰۰۰ هانری است.',
                ],
            ],
        ]);

        // Abhenry (CGS unit)
        UnitConverter::store([
            'type' => UnitTypeEnum::ELECTRIC_INDUCTANCE(),
            'value' => 0.000000001,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Abhenry',
                    'code' => 'abH',
                    'position' => 'left',
                    'description' => 'The abhenry is the CGS electromagnetic unit of inductance.',
                ],
                'fa' => [
                    'name' => 'آب‌هانری',
                    'code' => 'abH',
                    'position' => 'right',
                    'description' => 'آب‌هانری واحد اندوکتانس الکترومغناطیسی CGS است.',
                ],
            ],
        ]);
    }
}

