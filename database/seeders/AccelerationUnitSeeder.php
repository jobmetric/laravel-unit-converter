<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class AccelerationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Meter per Second Squared (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Meter per Second Squared',
                    'code'        => 'm/s²',
                    'position'    => 'left',
                    'description' => 'The meter per second squared is the SI derived unit of acceleration.',
                ],
                'fa' => [
                    'name'        => 'متر بر ثانیه مربع',
                    'code'        => 'm/s²',
                    'position'    => 'right',
                    'description' => 'متر بر ثانیه مربع واحد مشتق‌شده SI برای شتاب است.',
                ],
            ],
        ]);

        // Standard Gravity
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 9.80665,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Standard Gravity',
                    'code'        => 'g',
                    'position'    => 'left',
                    'description' => 'Standard gravity is the nominal gravitational acceleration at Earth\'s surface.',
                ],
                'fa' => [
                    'name'        => 'شتاب گرانش استاندارد',
                    'code'        => 'g',
                    'position'    => 'right',
                    'description' => 'شتاب گرانش استاندارد، شتاب گرانشی اسمی در سطح زمین است.',
                ],
            ],
        ]);

        // Centimeter per Second Squared
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centimeter per Second Squared',
                    'code'        => 'cm/s²',
                    'position'    => 'left',
                    'description' => 'Centimeter per second squared is a unit of acceleration.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌متر بر ثانیه مربع',
                    'code'        => 'cm/s²',
                    'position'    => 'right',
                    'description' => 'سانتی‌متر بر ثانیه مربع یک واحد شتاب است.',
                ],
            ],
        ]);

        // Gal (Galileo)
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gal',
                    'code'        => 'Gal',
                    'position'    => 'left',
                    'description' => 'The gal is a unit of acceleration used in gravimetry.',
                ],
                'fa' => [
                    'name'        => 'گال',
                    'code'        => 'Gal',
                    'position'    => 'right',
                    'description' => 'گال یک واحد شتاب است که در گراویمتری استفاده می‌شود.',
                ],
            ],
        ]);

        // Milligal
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milligal',
                    'code'        => 'mGal',
                    'position'    => 'left',
                    'description' => 'A milligal is one thousandth of a gal.',
                ],
                'fa' => [
                    'name'        => 'میلی‌گال',
                    'code'        => 'mGal',
                    'position'    => 'right',
                    'description' => 'میلی‌گال یک هزارم گال است.',
                ],
            ],
        ]);

        // Foot per Second Squared
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.3048,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot per Second Squared',
                    'code'        => 'ft/s²',
                    'position'    => 'left',
                    'description' => 'Foot per second squared is a unit of acceleration.',
                ],
                'fa' => [
                    'name'        => 'فوت بر ثانیه مربع',
                    'code'        => 'ft/s²',
                    'position'    => 'right',
                    'description' => 'فوت بر ثانیه مربع یک واحد شتاب است.',
                ],
            ],
        ]);

        // Inch per Second Squared
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.0254,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Inch per Second Squared',
                    'code'        => 'in/s²',
                    'position'    => 'left',
                    'description' => 'Inch per second squared is a unit of acceleration.',
                ],
                'fa' => [
                    'name'        => 'اینچ بر ثانیه مربع',
                    'code'        => 'in/s²',
                    'position'    => 'right',
                    'description' => 'اینچ بر ثانیه مربع یک واحد شتاب است.',
                ],
            ],
        ]);

        // Kilometer per Hour per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilometer per Hour per Second',
                    'code'        => 'km/h/s',
                    'position'    => 'left',
                    'description' => 'Kilometer per hour per second is a unit of acceleration.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر بر ساعت بر ثانیه',
                    'code'        => 'km/h/s',
                    'position'    => 'right',
                    'description' => 'کیلومتر بر ساعت بر ثانیه یک واحد شتاب است.',
                ],
            ],
        ]);

        // Mile per Hour per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.44704,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mile per Hour per Second',
                    'code'        => 'mph/s',
                    'position'    => 'left',
                    'description' => 'Mile per hour per second is a unit of acceleration.',
                ],
                'fa' => [
                    'name'        => 'مایل بر ساعت بر ثانیه',
                    'code'        => 'mph/s',
                    'position'    => 'right',
                    'description' => 'مایل بر ساعت بر ثانیه یک واحد شتاب است.',
                ],
            ],
        ]);

        // Knot per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::ACCELERATION(),
            'value'       => 0.514444,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Knot per Second',
                    'code'        => 'kn/s',
                    'position'    => 'left',
                    'description' => 'Knot per second is a unit of acceleration used in aviation.',
                ],
                'fa' => [
                    'name'        => 'گره بر ثانیه',
                    'code'        => 'kn/s',
                    'position'    => 'right',
                    'description' => 'گره بر ثانیه یک واحد شتاب است که در هوانوردی استفاده می‌شود.',
                ],
            ],
        ]);
    }
}

