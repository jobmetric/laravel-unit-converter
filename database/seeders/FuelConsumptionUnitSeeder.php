<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class FuelConsumptionUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kilometer per Liter (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilometer per Liter',
                    'code'        => 'km/L',
                    'position'    => 'left',
                    'description' => 'Kilometer per liter measures fuel efficiency.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر بر لیتر',
                    'code'        => 'km/L',
                    'position'    => 'right',
                    'description' => 'کیلومتر بر لیتر میزان بهره‌وری سوخت را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Liter per 100 Kilometer
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 100,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter per 100 Kilometer',
                    'code'        => 'L/100km',
                    'position'    => 'left',
                    'description' => 'Liter per 100 kilometers measures fuel consumption.',
                ],
                'fa' => [
                    'name'        => 'لیتر بر ۱۰۰ کیلومتر',
                    'code'        => 'L/100km',
                    'position'    => 'right',
                    'description' => 'لیتر بر ۱۰۰ کیلومتر میزان مصرف سوخت را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Miles per Gallon (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 0.425144,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Miles per Gallon (US)',
                    'code'        => 'mpg (US)',
                    'position'    => 'left',
                    'description' => 'Miles per US gallon measures fuel efficiency in the United States.',
                ],
                'fa' => [
                    'name'        => 'مایل بر گالن (آمریکایی)',
                    'code'        => 'mpg (US)',
                    'position'    => 'right',
                    'description' => 'مایل بر گالن آمریکایی میزان بهره‌وری سوخت در ایالات متحده را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Miles per Gallon (UK)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 0.354006,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Miles per Gallon (UK)',
                    'code'        => 'mpg (UK)',
                    'position'    => 'left',
                    'description' => 'Miles per UK gallon measures fuel efficiency in the United Kingdom.',
                ],
                'fa' => [
                    'name'        => 'مایل بر گالن (انگلیسی)',
                    'code'        => 'mpg (UK)',
                    'position'    => 'right',
                    'description' => 'مایل بر گالن انگلیسی میزان بهره‌وری سوخت در بریتانیا را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Liter per Kilometer
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter per Kilometer',
                    'code'        => 'L/km',
                    'position'    => 'left',
                    'description' => 'Liter per kilometer measures fuel consumption.',
                ],
                'fa' => [
                    'name'        => 'لیتر بر کیلومتر',
                    'code'        => 'L/km',
                    'position'    => 'right',
                    'description' => 'لیتر بر کیلومتر میزان مصرف سوخت را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Gallon per 100 Miles (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 2.35215,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gallon per 100 Miles (US)',
                    'code'        => 'gal/100mi',
                    'position'    => 'left',
                    'description' => 'US gallon per 100 miles measures fuel consumption.',
                ],
                'fa' => [
                    'name'        => 'گالن بر ۱۰۰ مایل (آمریکایی)',
                    'code'        => 'gal/100mi',
                    'position'    => 'right',
                    'description' => 'گالن آمریکایی بر ۱۰۰ مایل میزان مصرف سوخت را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Meter per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Meter per Liter',
                    'code'        => 'm/L',
                    'position'    => 'left',
                    'description' => 'Meter per liter measures fuel efficiency.',
                ],
                'fa' => [
                    'name'        => 'متر بر لیتر',
                    'code'        => 'm/L',
                    'position'    => 'right',
                    'description' => 'متر بر لیتر میزان بهره‌وری سوخت را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);

        // Kilometer per Gallon (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FUEL_CONSUMPTION(),
            'value'       => 0.264172,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilometer per Gallon (US)',
                    'code'        => 'km/gal',
                    'position'    => 'left',
                    'description' => 'Kilometer per US gallon measures fuel efficiency.',
                ],
                'fa' => [
                    'name'        => 'کیلومتر بر گالن (آمریکایی)',
                    'code'        => 'km/gal',
                    'position'    => 'right',
                    'description' => 'کیلومتر بر گالن آمریکایی میزان بهره‌وری سوخت را اندازه‌گیری می‌کند.',
                ],
            ],
        ]);
    }
}

