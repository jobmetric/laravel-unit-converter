<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class TorqueUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Newton Meter (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Newton Meter',
                    'code'        => 'N·m',
                    'position'    => 'left',
                    'description' => 'The newton meter is the SI derived unit of torque.',
                ],
                'fa' => [
                    'name'        => 'نیوتن متر',
                    'code'        => 'N·m',
                    'position'    => 'right',
                    'description' => 'نیوتن متر واحد مشتق‌شده SI برای گشتاور است.',
                ],
            ],
        ]);

        // Kilonewton Meter
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilonewton Meter',
                    'code'        => 'kN·m',
                    'position'    => 'left',
                    'description' => 'A kilonewton meter is 1,000 newton meters.',
                ],
                'fa' => [
                    'name'        => 'کیلونیوتن متر',
                    'code'        => 'kN·m',
                    'position'    => 'right',
                    'description' => 'کیلونیوتن متر برابر با ۱۰۰۰ نیوتن متر است.',
                ],
            ],
        ]);

        // Millinewton Meter
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millinewton Meter',
                    'code'        => 'mN·m',
                    'position'    => 'left',
                    'description' => 'A millinewton meter is one thousandth of a newton meter.',
                ],
                'fa' => [
                    'name'        => 'میلی‌نیوتن متر',
                    'code'        => 'mN·m',
                    'position'    => 'right',
                    'description' => 'میلی‌نیوتن متر یک هزارم نیوتن متر است.',
                ],
            ],
        ]);

        // Kilogram-force Meter
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 9.80665,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram-force Meter',
                    'code'        => 'kgf·m',
                    'position'    => 'left',
                    'description' => 'A kilogram-force meter is a unit of torque.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم-نیرو متر',
                    'code'        => 'kgf·m',
                    'position'    => 'right',
                    'description' => 'کیلوگرم-نیرو متر یک واحد گشتاور است.',
                ],
            ],
        ]);

        // Kilogram-force Centimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 0.0980665,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram-force Centimeter',
                    'code'        => 'kgf·cm',
                    'position'    => 'left',
                    'description' => 'A kilogram-force centimeter is a unit of torque.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم-نیرو سانتی‌متر',
                    'code'        => 'kgf·cm',
                    'position'    => 'right',
                    'description' => 'کیلوگرم-نیرو سانتی‌متر یک واحد گشتاور است.',
                ],
            ],
        ]);

        // Pound-force Foot
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 1.35582,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound-force Foot',
                    'code'        => 'lbf·ft',
                    'position'    => 'left',
                    'description' => 'The pound-force foot is a unit of torque commonly used in the US.',
                ],
                'fa' => [
                    'name'        => 'پوند-نیرو فوت',
                    'code'        => 'lbf·ft',
                    'position'    => 'right',
                    'description' => 'پوند-نیرو فوت یک واحد گشتاور است که معمولاً در آمریکا استفاده می‌شود.',
                ],
            ],
        ]);

        // Pound-force Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 0.112985,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound-force Inch',
                    'code'        => 'lbf·in',
                    'position'    => 'left',
                    'description' => 'The pound-force inch is a unit of torque.',
                ],
                'fa' => [
                    'name'        => 'پوند-نیرو اینچ',
                    'code'        => 'lbf·in',
                    'position'    => 'right',
                    'description' => 'پوند-نیرو اینچ یک واحد گشتاور است.',
                ],
            ],
        ]);

        // Ounce-force Inch
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 0.00706155,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ounce-force Inch',
                    'code'        => 'ozf·in',
                    'position'    => 'left',
                    'description' => 'The ounce-force inch is a unit of torque.',
                ],
                'fa' => [
                    'name'        => 'اونس-نیرو اینچ',
                    'code'        => 'ozf·in',
                    'position'    => 'right',
                    'description' => 'اونس-نیرو اینچ یک واحد گشتاور است.',
                ],
            ],
        ]);

        // Dyne Centimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::TORQUE(),
            'value'       => 0.0000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dyne Centimeter',
                    'code'        => 'dyn·cm',
                    'position'    => 'left',
                    'description' => 'The dyne centimeter is a unit of torque in the CGS system.',
                ],
                'fa' => [
                    'name'        => 'داین سانتی‌متر',
                    'code'        => 'dyn·cm',
                    'position'    => 'right',
                    'description' => 'داین سانتی‌متر یک واحد گشتاور در سیستم CGS است.',
                ],
            ],
        ]);
    }
}

