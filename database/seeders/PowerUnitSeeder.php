<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class PowerUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Watt (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Watt',
                    'code'        => 'W',
                    'position'    => 'left',
                    'description' => 'The watt is the SI derived unit of power.',
                ],
                'fa' => [
                    'name'        => 'وات',
                    'code'        => 'W',
                    'position'    => 'right',
                    'description' => 'وات واحد مشتق‌شده SI برای توان است.',
                ],
            ],
        ]);

        // Milliwatt
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliwatt',
                    'code'        => 'mW',
                    'position'    => 'left',
                    'description' => 'A milliwatt is one thousandth of a watt.',
                ],
                'fa' => [
                    'name'        => 'میلی‌وات',
                    'code'        => 'mW',
                    'position'    => 'right',
                    'description' => 'میلی‌وات یک هزارم وات است.',
                ],
            ],
        ]);

        // Kilowatt
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilowatt',
                    'code'        => 'kW',
                    'position'    => 'left',
                    'description' => 'A kilowatt is 1,000 watts.',
                ],
                'fa' => [
                    'name'        => 'کیلووات',
                    'code'        => 'kW',
                    'position'    => 'right',
                    'description' => 'کیلووات برابر با ۱۰۰۰ وات است.',
                ],
            ],
        ]);

        // Megawatt
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megawatt',
                    'code'        => 'MW',
                    'position'    => 'left',
                    'description' => 'A megawatt is 1,000,000 watts.',
                ],
                'fa' => [
                    'name'        => 'مگاوات',
                    'code'        => 'MW',
                    'position'    => 'right',
                    'description' => 'مگاوات برابر با ۱،۰۰۰،۰۰۰ وات است.',
                ],
            ],
        ]);

        // Gigawatt
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigawatt',
                    'code'        => 'GW',
                    'position'    => 'left',
                    'description' => 'A gigawatt is 1,000,000,000 watts.',
                ],
                'fa' => [
                    'name'        => 'گیگاوات',
                    'code'        => 'GW',
                    'position'    => 'right',
                    'description' => 'گیگاوات برابر با ۱،۰۰۰،۰۰۰،۰۰۰ وات است.',
                ],
            ],
        ]);

        // Horsepower (Mechanical)
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 745.7,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Horsepower',
                    'code'        => 'hp',
                    'position'    => 'left',
                    'description' => 'Horsepower is a unit of power commonly used for engines.',
                ],
                'fa' => [
                    'name'        => 'اسب بخار',
                    'code'        => 'اسب',
                    'position'    => 'right',
                    'description' => 'اسب بخار یک واحد توان است که معمولاً برای موتورها استفاده می‌شود.',
                ],
            ],
        ]);

        // Metric Horsepower
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 735.5,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Metric Horsepower',
                    'code'        => 'PS',
                    'position'    => 'left',
                    'description' => 'Metric horsepower is a unit of power used in Europe.',
                ],
                'fa' => [
                    'name'        => 'اسب بخار متریک',
                    'code'        => 'PS',
                    'position'    => 'right',
                    'description' => 'اسب بخار متریک یک واحد توان است که در اروپا استفاده می‌شود.',
                ],
            ],
        ]);

        // BTU per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 0.293071,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'BTU per Hour',
                    'code'        => 'BTU/h',
                    'position'    => 'left',
                    'description' => 'BTU per hour is a unit of power used in HVAC.',
                ],
                'fa' => [
                    'name'        => 'بی‌تی‌یو بر ساعت',
                    'code'        => 'BTU/h',
                    'position'    => 'right',
                    'description' => 'بی‌تی‌یو بر ساعت یک واحد توان است که در تهویه مطبوع استفاده می‌شود.',
                ],
            ],
        ]);

        // Foot-pound per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 1.35582,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot-pound per Second',
                    'code'        => 'ft·lb/s',
                    'position'    => 'left',
                    'description' => 'Foot-pound per second is a unit of power.',
                ],
                'fa' => [
                    'name'        => 'فوت-پوند بر ثانیه',
                    'code'        => 'ft·lb/s',
                    'position'    => 'right',
                    'description' => 'فوت-پوند بر ثانیه یک واحد توان است.',
                ],
            ],
        ]);

        // Calorie per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 4.184,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Calorie per Second',
                    'code'        => 'cal/s',
                    'position'    => 'left',
                    'description' => 'Calorie per second is a unit of power.',
                ],
                'fa' => [
                    'name'        => 'کالری بر ثانیه',
                    'code'        => 'cal/s',
                    'position'    => 'right',
                    'description' => 'کالری بر ثانیه یک واحد توان است.',
                ],
            ],
        ]);

        // Kilocalorie per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 1.163,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilocalorie per Hour',
                    'code'        => 'kcal/h',
                    'position'    => 'left',
                    'description' => 'Kilocalorie per hour is a unit of power.',
                ],
                'fa' => [
                    'name'        => 'کیلوکالری بر ساعت',
                    'code'        => 'kcal/h',
                    'position'    => 'right',
                    'description' => 'کیلوکالری بر ساعت یک واحد توان است.',
                ],
            ],
        ]);

        // Erg per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 0.0000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Erg per Second',
                    'code'        => 'erg/s',
                    'position'    => 'left',
                    'description' => 'Erg per second is a unit of power in the CGS system.',
                ],
                'fa' => [
                    'name'        => 'ارگ بر ثانیه',
                    'code'        => 'erg/s',
                    'position'    => 'right',
                    'description' => 'ارگ بر ثانیه یک واحد توان در سیستم CGS است.',
                ],
            ],
        ]);

        // Ton of Refrigeration
        UnitConverter::store([
            'type'        => UnitTypeEnum::POWER(),
            'value'       => 3516.85,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ton of Refrigeration',
                    'code'        => 'TR',
                    'position'    => 'left',
                    'description' => 'A ton of refrigeration is a unit of power used for cooling systems.',
                ],
                'fa' => [
                    'name'        => 'تن تبرید',
                    'code'        => 'تن تبرید',
                    'position'    => 'right',
                    'description' => 'تن تبرید یک واحد توان است که برای سیستم‌های سرمایشی استفاده می‌شود.',
                ],
            ],
        ]);
    }
}

