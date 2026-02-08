<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class TemperatureUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Note: Temperature conversion is not linear, so the 'value' field
     * is used as a reference multiplier only. Actual conversion requires
     * offset calculations (e.g., °F = °C × 9/5 + 32).
     */
    public function run(): void
    {
        // Kelvin (base unit - SI unit)
        UnitConverter::store([
            'type' => UnitTypeEnum::TEMPERATURE(),
            'value' => 1,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Kelvin',
                    'code' => 'K',
                    'position' => 'right',
                    'description' => 'The kelvin is the SI base unit of temperature.',
                ],
                'fa' => [
                    'name' => 'کلوین',
                    'code' => 'K',
                    'position' => 'left',
                    'description' => 'کلوین واحد پایه SI برای دما است.',
                ],
            ],
        ]);

        // Celsius
        UnitConverter::store([
            'type' => UnitTypeEnum::TEMPERATURE(),
            'value' => 274.15,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Celsius',
                    'code' => '°C',
                    'position' => 'right',
                    'description' => 'The Celsius scale, also known as the centigrade scale.',
                ],
                'fa' => [
                    'name' => 'سلسیوس',
                    'code' => '°C',
                    'position' => 'left',
                    'description' => 'مقیاس سلسیوس که به مقیاس سانتی‌گراد نیز معروف است.',
                ],
            ],
        ]);

        // Fahrenheit
        UnitConverter::store([
            'type' => UnitTypeEnum::TEMPERATURE(),
            'value' => 255.9278,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Fahrenheit',
                    'code' => '°F',
                    'position' => 'right',
                    'description' => 'The Fahrenheit scale is a temperature scale used mainly in the United States.',
                ],
                'fa' => [
                    'name' => 'فارنهایت',
                    'code' => '°F',
                    'position' => 'left',
                    'description' => 'مقیاس فارنهایت یک مقیاس دما است که عمدتاً در ایالات متحده استفاده می‌شود.',
                ],
            ],
        ]);

        // Rankine
        UnitConverter::store([
            'type' => UnitTypeEnum::TEMPERATURE(),
            'value' => 0.5556,
            'status' => true,
            'translation' => [
                'en' => [
                    'name' => 'Rankine',
                    'code' => '°R',
                    'position' => 'right',
                    'description' => 'The Rankine scale is an absolute temperature scale using Fahrenheit degrees.',
                ],
                'fa' => [
                    'name' => 'رنکین',
                    'code' => '°R',
                    'position' => 'left',
                    'description' => 'مقیاس رنکین یک مقیاس دمای مطلق است که از درجه‌های فارنهایت استفاده می‌کند.',
                ],
            ],
        ]);
    }
}
