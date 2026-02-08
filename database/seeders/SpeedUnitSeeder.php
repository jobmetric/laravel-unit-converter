<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class SpeedUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Meter per Second (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Meter per Second',
                    'code'        => 'm/s',
                    'position'    => 'left',
                    'description' => 'The meter per second is the SI derived unit of speed.',
                ],
                'fa' => [
                    'name'        => 'متر بر ثانیه',
                    'code'        => 'm/s',
                    'position'    => 'right',
                    'description' => 'متر بر ثانیه واحد مشتق‌شده SI برای سرعت است.',
                ],
            ],
        ]);

        // Kilometer per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 0.277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilometer per Hour',
                    'code'        => 'km/h',
                    'position'    => 'left',
                    'description' => 'Kilometer per hour is a unit of speed.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر بر ساعت',
                    'code'        => 'km/h',
                    'position'    => 'right',
                    'description' => 'کیلومتر بر ساعت یک واحد سرعت است.',
                ],
            ],
        ]);

        // Mile per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 0.44704,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mile per Hour',
                    'code'        => 'mph',
                    'position'    => 'left',
                    'description' => 'Mile per hour is a unit of speed commonly used in the US and UK.',
                ],
                'fa' => [
                    'name'        => 'مایل بر ساعت',
                    'code'        => 'mph',
                    'position'    => 'right',
                    'description' => 'مایل بر ساعت یک واحد سرعت است که معمولاً در آمریکا و بریتانیا استفاده می‌شود.',
                ],
            ],
        ]);

        // Knot
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 0.514444,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Knot',
                    'code'        => 'kn',
                    'position'    => 'left',
                    'description' => 'The knot is a unit of speed equal to one nautical mile per hour.',
                ],
                'fa' => [
                    'name'        => 'گره',
                    'code'        => 'گره',
                    'position'    => 'right',
                    'description' => 'گره یک واحد سرعت برابر با یک مایل دریایی بر ساعت است.',
                ],
            ],
        ]);

        // Foot per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 0.3048,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot per Second',
                    'code'        => 'ft/s',
                    'position'    => 'left',
                    'description' => 'Foot per second is a unit of speed.',
                ],
                'fa' => [
                    'name'        => 'فوت بر ثانیه',
                    'code'        => 'ft/s',
                    'position'    => 'right',
                    'description' => 'فوت بر ثانیه یک واحد سرعت است.',
                ],
            ],
        ]);

        // Speed of Light
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 299792458,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Speed of Light',
                    'code'        => 'c',
                    'position'    => 'left',
                    'description' => 'The speed of light in vacuum is approximately 299,792,458 m/s.',
                ],
                'fa' => [
                    'name'        => 'سرعت نور',
                    'code'        => 'c',
                    'position'    => 'right',
                    'description' => 'سرعت نور در خلأ تقریباً ۲۹۹،۷۹۲،۴۵۸ متر بر ثانیه است.',
                ],
            ],
        ]);

        // Mach (Speed of Sound)
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 343,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mach',
                    'code'        => 'Ma',
                    'position'    => 'left',
                    'description' => 'Mach number is the ratio of flow velocity to the speed of sound.',
                ],
                'fa' => [
                    'name'        => 'ماخ',
                    'code'        => 'ماخ',
                    'position'    => 'right',
                    'description' => 'عدد ماخ نسبت سرعت جریان به سرعت صوت است.',
                ],
            ],
        ]);

        // Centimeter per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centimeter per Second',
                    'code'        => 'cm/s',
                    'position'    => 'left',
                    'description' => 'Centimeter per second is a unit of speed.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌متر بر ثانیه',
                    'code'        => 'cm/s',
                    'position'    => 'right',
                    'description' => 'سانتی‌متر بر ثانیه یک واحد سرعت است.',
                ],
            ],
        ]);

        // Kilometer per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::SPEED(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilometer per Second',
                    'code'        => 'km/s',
                    'position'    => 'left',
                    'description' => 'Kilometer per second is a unit of speed.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر بر ثانیه',
                    'code'        => 'km/s',
                    'position'    => 'right',
                    'description' => 'کیلومتر بر ثانیه یک واحد سرعت است.',
                ],
            ],
        ]);
    }
}

