<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class AngleUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Degree (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Degree',
                    'code'        => '°',
                    'position'    => 'right',
                    'description' => 'A degree is a unit of angle measurement, 1/360 of a full circle.',
                ],
                'fa' => [
                    'name'        => 'درجه',
                    'code'        => '°',
                    'position'    => 'left',
                    'description' => 'درجه یک واحد اندازه‌گیری زاویه است، ۱/۳۶۰ یک دایره کامل.',
                ],
            ],
        ]);

        // Radian
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 57.2958,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Radian',
                    'code'        => 'rad',
                    'position'    => 'left',
                    'description' => 'The radian is the SI unit of angular measure.',
                ],
                'fa' => [
                    'name'        => 'رادیان',
                    'code'        => 'rad',
                    'position'    => 'right',
                    'description' => 'رادیان واحد SI برای اندازه‌گیری زاویه است.',
                ],
            ],
        ]);

        // Gradian (Gon)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 0.9,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gradian',
                    'code'        => 'gon',
                    'position'    => 'left',
                    'description' => 'A gradian is 1/400 of a full circle.',
                ],
                'fa' => [
                    'name'        => 'گرادیان',
                    'code'        => 'gon',
                    'position'    => 'right',
                    'description' => 'گرادیان ۱/۴۰۰ یک دایره کامل است.',
                ],
            ],
        ]);

        // Arcminute (Minute of arc)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 0.0166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Arcminute',
                    'code'        => '′',
                    'position'    => 'right',
                    'description' => 'An arcminute is 1/60 of a degree.',
                ],
                'fa' => [
                    'name'        => 'دقیقه قوسی',
                    'code'        => '′',
                    'position'    => 'left',
                    'description' => 'دقیقه قوسی ۱/۶۰ درجه است.',
                ],
            ],
        ]);

        // Arcsecond (Second of arc)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 0.000277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Arcsecond',
                    'code'        => '″',
                    'position'    => 'right',
                    'description' => 'An arcsecond is 1/3600 of a degree.',
                ],
                'fa' => [
                    'name'        => 'ثانیه قوسی',
                    'code'        => '″',
                    'position'    => 'left',
                    'description' => 'ثانیه قوسی ۱/۳۶۰۰ درجه است.',
                ],
            ],
        ]);

        // Revolution (Turn)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 360,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Revolution',
                    'code'        => 'rev',
                    'position'    => 'left',
                    'description' => 'A revolution (turn) is a complete rotation, 360 degrees.',
                ],
                'fa' => [
                    'name'        => 'دور',
                    'code'        => 'دور',
                    'position'    => 'right',
                    'description' => 'یک دور چرخش کامل است، ۳۶۰ درجه.',
                ],
            ],
        ]);

        // Milliradian
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 0.0572958,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliradian',
                    'code'        => 'mrad',
                    'position'    => 'left',
                    'description' => 'A milliradian is one thousandth of a radian.',
                ],
                'fa' => [
                    'name'        => 'میلی‌رادیان',
                    'code'        => 'mrad',
                    'position'    => 'right',
                    'description' => 'میلی‌رادیان یک هزارم رادیان است.',
                ],
            ],
        ]);

        // Quadrant (Quarter circle)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 90,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Quadrant',
                    'code'        => 'quad',
                    'position'    => 'left',
                    'description' => 'A quadrant is 90 degrees or 1/4 of a circle.',
                ],
                'fa' => [
                    'name'        => 'ربع دایره',
                    'code'        => 'ربع',
                    'position'    => 'right',
                    'description' => 'ربع دایره ۹۰ درجه یا ۱/۴ دایره است.',
                ],
            ],
        ]);

        // Sextant
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 60,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Sextant',
                    'code'        => 'sext',
                    'position'    => 'left',
                    'description' => 'A sextant is 60 degrees or 1/6 of a circle.',
                ],
                'fa' => [
                    'name'        => 'یک‌ششم دایره',
                    'code'        => 'یک‌ششم',
                    'position'    => 'right',
                    'description' => 'یک‌ششم دایره ۶۰ درجه یا ۱/۶ دایره است.',
                ],
            ],
        ]);

        // Sign (Zodiac)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ANGLE(),
            'value'       => 30,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Sign',
                    'code'        => 'sign',
                    'position'    => 'left',
                    'description' => 'A sign is 30 degrees, used in astrology.',
                ],
                'fa' => [
                    'name'        => 'برج',
                    'code'        => 'برج',
                    'position'    => 'right',
                    'description' => 'برج ۳۰ درجه است که در نجوم استفاده می‌شود.',
                ],
            ],
        ]);
    }
}

