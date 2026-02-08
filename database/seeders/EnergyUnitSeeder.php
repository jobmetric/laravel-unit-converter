<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class EnergyUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Joule (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Joule',
                    'code'        => 'J',
                    'position'    => 'left',
                    'description' => 'The joule is the SI derived unit of energy.',
                ],
                'fa' => [
                    'name'        => 'ژول',
                    'code'        => 'J',
                    'position'    => 'right',
                    'description' => 'ژول واحد مشتق‌شده SI برای انرژی است.',
                ],
            ],
        ]);

        // Kilojoule
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilojoule',
                    'code'        => 'kJ',
                    'position'    => 'left',
                    'description' => 'A kilojoule is 1,000 joules.',
                ],
                'fa' => [
                    'name'        => 'کیلوژول',
                    'code'        => 'kJ',
                    'position'    => 'right',
                    'description' => 'کیلوژول برابر با ۱۰۰۰ ژول است.',
                ],
            ],
        ]);

        // Megajoule
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megajoule',
                    'code'        => 'MJ',
                    'position'    => 'left',
                    'description' => 'A megajoule is 1,000,000 joules.',
                ],
                'fa' => [
                    'name'        => 'مگاژول',
                    'code'        => 'MJ',
                    'position'    => 'right',
                    'description' => 'مگاژول برابر با ۱،۰۰۰،۰۰۰ ژول است.',
                ],
            ],
        ]);

        // Gigajoule
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigajoule',
                    'code'        => 'GJ',
                    'position'    => 'left',
                    'description' => 'A gigajoule is 1,000,000,000 joules.',
                ],
                'fa' => [
                    'name'        => 'گیگاژول',
                    'code'        => 'GJ',
                    'position'    => 'right',
                    'description' => 'گیگاژول برابر با ۱،۰۰۰،۰۰۰،۰۰۰ ژول است.',
                ],
            ],
        ]);

        // Calorie
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 4.184,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Calorie',
                    'code'        => 'cal',
                    'position'    => 'left',
                    'description' => 'A calorie is a unit of energy.',
                ],
                'fa' => [
                    'name'        => 'کالری',
                    'code'        => 'کالری',
                    'position'    => 'right',
                    'description' => 'کالری یک واحد انرژی است.',
                ],
            ],
        ]);

        // Kilocalorie (food calorie)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 4184,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilocalorie',
                    'code'        => 'kcal',
                    'position'    => 'left',
                    'description' => 'A kilocalorie (food calorie) is 1,000 calories.',
                ],
                'fa' => [
                    'name'        => 'کیلوکالری',
                    'code'        => 'کیلوکالری',
                    'position'    => 'right',
                    'description' => 'کیلوکالری (کالری غذایی) برابر با ۱۰۰۰ کالری است.',
                ],
            ],
        ]);

        // Watt Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 3600,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Watt Hour',
                    'code'        => 'Wh',
                    'position'    => 'left',
                    'description' => 'A watt hour is 3,600 joules.',
                ],
                'fa' => [
                    'name'        => 'وات ساعت',
                    'code'        => 'Wh',
                    'position'    => 'right',
                    'description' => 'وات ساعت برابر با ۳۶۰۰ ژول است.',
                ],
            ],
        ]);

        // Kilowatt Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 3600000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilowatt Hour',
                    'code'        => 'kWh',
                    'position'    => 'left',
                    'description' => 'A kilowatt hour is 3,600,000 joules, commonly used for electricity billing.',
                ],
                'fa' => [
                    'name'        => 'کیلووات ساعت',
                    'code'        => 'kWh',
                    'position'    => 'right',
                    'description' => 'کیلووات ساعت برابر با ۳،۶۰۰،۰۰۰ ژول است و معمولاً برای محاسبه مصرف برق استفاده می‌شود.',
                ],
            ],
        ]);

        // Megawatt Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 3600000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megawatt Hour',
                    'code'        => 'MWh',
                    'position'    => 'left',
                    'description' => 'A megawatt hour is 1,000 kilowatt hours.',
                ],
                'fa' => [
                    'name'        => 'مگاوات ساعت',
                    'code'        => 'MWh',
                    'position'    => 'right',
                    'description' => 'مگاوات ساعت برابر با ۱۰۰۰ کیلووات ساعت است.',
                ],
            ],
        ]);

        // Electronvolt
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 0.0000000000000000001602176634,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Electronvolt',
                    'code'        => 'eV',
                    'position'    => 'left',
                    'description' => 'An electronvolt is a unit of energy used in particle physics.',
                ],
                'fa' => [
                    'name'        => 'الکترون‌ولت',
                    'code'        => 'eV',
                    'position'    => 'right',
                    'description' => 'الکترون‌ولت یک واحد انرژی است که در فیزیک ذرات استفاده می‌شود.',
                ],
            ],
        ]);

        // British Thermal Unit
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 1055.06,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'British Thermal Unit',
                    'code'        => 'BTU',
                    'position'    => 'left',
                    'description' => 'The British thermal unit is a unit of heat.',
                ],
                'fa' => [
                    'name'        => 'واحد حرارتی بریتانیایی',
                    'code'        => 'BTU',
                    'position'    => 'right',
                    'description' => 'واحد حرارتی بریتانیایی یک واحد گرما است.',
                ],
            ],
        ]);

        // Erg
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 0.0000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Erg',
                    'code'        => 'erg',
                    'position'    => 'left',
                    'description' => 'The erg is a unit of energy in the CGS system.',
                ],
                'fa' => [
                    'name'        => 'ارگ',
                    'code'        => 'ارگ',
                    'position'    => 'right',
                    'description' => 'ارگ یک واحد انرژی در سیستم CGS است.',
                ],
            ],
        ]);

        // Foot-pound
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 1.35582,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot-pound',
                    'code'        => 'ft·lb',
                    'position'    => 'left',
                    'description' => 'A foot-pound is a unit of energy.',
                ],
                'fa' => [
                    'name'        => 'فوت-پوند',
                    'code'        => 'ft·lb',
                    'position'    => 'right',
                    'description' => 'فوت-پوند یک واحد انرژی است.',
                ],
            ],
        ]);

        // Therm
        UnitConverter::store([
            'type'        => UnitTypeEnum::ENERGY(),
            'value'       => 105505600,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Therm',
                    'code'        => 'thm',
                    'position'    => 'left',
                    'description' => 'A therm is a unit of heat energy equal to 100,000 BTU.',
                ],
                'fa' => [
                    'name'        => 'ترم',
                    'code'        => 'ترم',
                    'position'    => 'right',
                    'description' => 'ترم یک واحد انرژی حرارتی برابر با ۱۰۰،۰۰۰ BTU است.',
                ],
            ],
        ]);
    }
}

