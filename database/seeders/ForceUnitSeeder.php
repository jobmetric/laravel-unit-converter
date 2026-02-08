<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ForceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Newton (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Newton',
                    'code'        => 'N',
                    'position'    => 'left',
                    'description' => 'The newton is the SI derived unit of force.',
                ],
                'fa' => [
                    'name'        => 'نیوتن',
                    'code'        => 'N',
                    'position'    => 'right',
                    'description' => 'نیوتن واحد مشتق‌شده SI برای نیرو است.',
                ],
            ],
        ]);

        // Kilonewton
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilonewton',
                    'code'        => 'kN',
                    'position'    => 'left',
                    'description' => 'A kilonewton is 1,000 newtons.',
                ],
                'fa' => [
                    'name'        => 'کیلونیوتن',
                    'code'        => 'kN',
                    'position'    => 'right',
                    'description' => 'کیلونیوتن برابر با ۱۰۰۰ نیوتن است.',
                ],
            ],
        ]);

        // Meganewton
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Meganewton',
                    'code'        => 'MN',
                    'position'    => 'left',
                    'description' => 'A meganewton is 1,000,000 newtons.',
                ],
                'fa' => [
                    'name'        => 'مگانیوتن',
                    'code'        => 'MN',
                    'position'    => 'right',
                    'description' => 'مگانیوتن برابر با ۱،۰۰۰،۰۰۰ نیوتن است.',
                ],
            ],
        ]);

        // Millinewton
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millinewton',
                    'code'        => 'mN',
                    'position'    => 'left',
                    'description' => 'A millinewton is one thousandth of a newton.',
                ],
                'fa' => [
                    'name'        => 'میلی‌نیوتن',
                    'code'        => 'mN',
                    'position'    => 'right',
                    'description' => 'میلی‌نیوتن یک هزارم نیوتن است.',
                ],
            ],
        ]);

        // Dyne
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 0.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dyne',
                    'code'        => 'dyn',
                    'position'    => 'left',
                    'description' => 'The dyne is a unit of force in the CGS system.',
                ],
                'fa' => [
                    'name'        => 'داین',
                    'code'        => 'داین',
                    'position'    => 'right',
                    'description' => 'داین یک واحد نیرو در سیستم CGS است.',
                ],
            ],
        ]);

        // Kilogram-force
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 9.80665,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram-force',
                    'code'        => 'kgf',
                    'position'    => 'left',
                    'description' => 'The kilogram-force is a gravitational metric unit of force.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم-نیرو',
                    'code'        => 'kgf',
                    'position'    => 'right',
                    'description' => 'کیلوگرم-نیرو یک واحد گرانشی متریک برای نیرو است.',
                ],
            ],
        ]);

        // Gram-force
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 0.00980665,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram-force',
                    'code'        => 'gf',
                    'position'    => 'left',
                    'description' => 'The gram-force is a unit of force.',
                ],
                'fa' => [
                    'name'        => 'گرم-نیرو',
                    'code'        => 'gf',
                    'position'    => 'right',
                    'description' => 'گرم-نیرو یک واحد نیرو است.',
                ],
            ],
        ]);

        // Pound-force
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 4.44822,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound-force',
                    'code'        => 'lbf',
                    'position'    => 'left',
                    'description' => 'The pound-force is a unit of force used in the imperial system.',
                ],
                'fa' => [
                    'name'        => 'پوند-نیرو',
                    'code'        => 'lbf',
                    'position'    => 'right',
                    'description' => 'پوند-نیرو یک واحد نیرو در سیستم امپریال است.',
                ],
            ],
        ]);

        // Ounce-force
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 0.278014,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ounce-force',
                    'code'        => 'ozf',
                    'position'    => 'left',
                    'description' => 'The ounce-force is a unit of force.',
                ],
                'fa' => [
                    'name'        => 'اونس-نیرو',
                    'code'        => 'ozf',
                    'position'    => 'right',
                    'description' => 'اونس-نیرو یک واحد نیرو است.',
                ],
            ],
        ]);

        // Poundal
        UnitConverter::store([
            'type'        => UnitTypeEnum::FORCE(),
            'value'       => 0.138255,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Poundal',
                    'code'        => 'pdl',
                    'position'    => 'left',
                    'description' => 'The poundal is a unit of force in the FPS system.',
                ],
                'fa' => [
                    'name'        => 'پوندال',
                    'code'        => 'pdl',
                    'position'    => 'right',
                    'description' => 'پوندال یک واحد نیرو در سیستم FPS است.',
                ],
            ],
        ]);
    }
}

