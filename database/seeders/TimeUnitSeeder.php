<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class TimeUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Second (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Second',
                    'code'        => 's',
                    'position'    => 'left',
                    'description' => 'The second is the SI base unit of time.',
                ],
                'fa' => [
                    'name'        => 'ثانیه',
                    'code'        => 'ثانیه',
                    'position'    => 'right',
                    'description' => 'ثانیه واحد پایه SI برای زمان است.',
                ],
            ],
        ]);

        // Millisecond
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millisecond',
                    'code'        => 'ms',
                    'position'    => 'left',
                    'description' => 'A millisecond is one thousandth of a second.',
                ],
                'fa' => [
                    'name'        => 'میلی‌ثانیه',
                    'code'        => 'میلی‌ثانیه',
                    'position'    => 'right',
                    'description' => 'میلی‌ثانیه یک هزارم ثانیه است.',
                ],
            ],
        ]);

        // Microsecond
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microsecond',
                    'code'        => 'µs',
                    'position'    => 'left',
                    'description' => 'A microsecond is one millionth of a second.',
                ],
                'fa' => [
                    'name'        => 'میکروثانیه',
                    'code'        => 'میکروثانیه',
                    'position'    => 'right',
                    'description' => 'میکروثانیه یک میلیونم ثانیه است.',
                ],
            ],
        ]);

        // Nanosecond
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nanosecond',
                    'code'        => 'ns',
                    'position'    => 'left',
                    'description' => 'A nanosecond is one billionth of a second.',
                ],
                'fa' => [
                    'name'        => 'نانوثانیه',
                    'code'        => 'نانوثانیه',
                    'position'    => 'right',
                    'description' => 'نانوثانیه یک میلیاردم ثانیه است.',
                ],
            ],
        ]);

        // Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 60,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Minute',
                    'code'        => 'min',
                    'position'    => 'left',
                    'description' => 'A minute is 60 seconds.',
                ],
                'fa' => [
                    'name'        => 'دقیقه',
                    'code'        => 'دقیقه',
                    'position'    => 'right',
                    'description' => 'یک دقیقه برابر با ۶۰ ثانیه است.',
                ],
            ],
        ]);

        // Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 3600,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Hour',
                    'code'        => 'h',
                    'position'    => 'left',
                    'description' => 'An hour is 60 minutes or 3,600 seconds.',
                ],
                'fa' => [
                    'name'        => 'ساعت',
                    'code'        => 'ساعت',
                    'position'    => 'right',
                    'description' => 'یک ساعت برابر با ۶۰ دقیقه یا ۳۶۰۰ ثانیه است.',
                ],
            ],
        ]);

        // Day
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 86400,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Day',
                    'code'        => 'd',
                    'position'    => 'left',
                    'description' => 'A day is 24 hours or 86,400 seconds.',
                ],
                'fa' => [
                    'name'        => 'روز',
                    'code'        => 'روز',
                    'position'    => 'right',
                    'description' => 'یک روز برابر با ۲۴ ساعت یا ۸۶۴۰۰ ثانیه است.',
                ],
            ],
        ]);

        // Week
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 604800,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Week',
                    'code'        => 'wk',
                    'position'    => 'left',
                    'description' => 'A week is 7 days.',
                ],
                'fa' => [
                    'name'        => 'هفته',
                    'code'        => 'هفته',
                    'position'    => 'right',
                    'description' => 'یک هفته برابر با ۷ روز است.',
                ],
            ],
        ]);

        // Month (average - 30.44 days)
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 2629746,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Month',
                    'code'        => 'mo',
                    'position'    => 'left',
                    'description' => 'A month is approximately 30.44 days on average.',
                ],
                'fa' => [
                    'name'        => 'ماه',
                    'code'        => 'ماه',
                    'position'    => 'right',
                    'description' => 'یک ماه به طور میانگین تقریباً ۳۰.۴۴ روز است.',
                ],
            ],
        ]);

        // Year (365.25 days)
        UnitConverter::store([
            'type'        => UnitTypeEnum::TIME(),
            'value'       => 31557600,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Year',
                    'code'        => 'yr',
                    'position'    => 'left',
                    'description' => 'A year is approximately 365.25 days.',
                ],
                'fa' => [
                    'name'        => 'سال',
                    'code'        => 'سال',
                    'position'    => 'right',
                    'description' => 'یک سال تقریباً ۳۶۵.۲۵ روز است.',
                ],
            ],
        ]);
    }
}

