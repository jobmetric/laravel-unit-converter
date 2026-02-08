<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class HeatTransferCoefficientUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Watt per Square Meter Kelvin (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::HEAT_TRANSFER_COEFFICIENT(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Watt per Square Meter Kelvin',
                    'code'        => 'W/(m²·K)',
                    'position'    => 'left',
                    'description' => 'The watt per square meter kelvin is the SI unit of heat transfer coefficient.',
                ],
                'fa' => [
                    'name'        => 'وات بر متر مربع کلوین',
                    'code'        => 'W/(m²·K)',
                    'position'    => 'right',
                    'description' => 'وات بر متر مربع کلوین واحد SI برای ضریب انتقال حرارت است.',
                ],
            ],
        ]);

        // BTU per Hour Square Foot Fahrenheit
        UnitConverter::store([
            'type'        => UnitTypeEnum::HEAT_TRANSFER_COEFFICIENT(),
            'value'       => 5.67826,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'BTU per Hour Square Foot Fahrenheit',
                    'code'        => 'BTU/(h·ft²·°F)',
                    'position'    => 'left',
                    'description' => 'BTU per hour square foot fahrenheit is a unit of heat transfer coefficient.',
                ],
                'fa' => [
                    'name'        => 'بی‌تی‌یو بر ساعت فوت مربع فارنهایت',
                    'code'        => 'BTU/(h·ft²·°F)',
                    'position'    => 'right',
                    'description' => 'بی‌تی‌یو بر ساعت فوت مربع فارنهایت یک واحد ضریب انتقال حرارت است.',
                ],
            ],
        ]);

        // Kilowatt per Square Meter Kelvin
        UnitConverter::store([
            'type'        => UnitTypeEnum::HEAT_TRANSFER_COEFFICIENT(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilowatt per Square Meter Kelvin',
                    'code'        => 'kW/(m²·K)',
                    'position'    => 'left',
                    'description' => 'A kilowatt per square meter kelvin is a unit of heat transfer coefficient.',
                ],
                'fa' => [
                    'name'        => 'کیلووات بر متر مربع کلوین',
                    'code'        => 'kW/(m²·K)',
                    'position'    => 'right',
                    'description' => 'کیلووات بر متر مربع کلوین یک واحد ضریب انتقال حرارت است.',
                ],
            ],
        ]);

        // Calorie per Second Square Centimeter Celsius
        UnitConverter::store([
            'type'        => UnitTypeEnum::HEAT_TRANSFER_COEFFICIENT(),
            'value'       => 41868,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Calorie per Second Square Centimeter Celsius',
                    'code'        => 'cal/(s·cm²·°C)',
                    'position'    => 'left',
                    'description' => 'Calorie per second square centimeter celsius is a unit of heat transfer coefficient.',
                ],
                'fa' => [
                    'name'        => 'کالری بر ثانیه سانتی‌متر مربع سلسیوس',
                    'code'        => 'cal/(s·cm²·°C)',
                    'position'    => 'right',
                    'description' => 'کالری بر ثانیه سانتی‌متر مربع سلسیوس یک واحد ضریب انتقال حرارت است.',
                ],
            ],
        ]);

        // Watt per Square Centimeter Kelvin
        UnitConverter::store([
            'type'        => UnitTypeEnum::HEAT_TRANSFER_COEFFICIENT(),
            'value'       => 10000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Watt per Square Centimeter Kelvin',
                    'code'        => 'W/(cm²·K)',
                    'position'    => 'left',
                    'description' => 'A watt per square centimeter kelvin is a unit of heat transfer coefficient.',
                ],
                'fa' => [
                    'name'        => 'وات بر سانتی‌متر مربع کلوین',
                    'code'        => 'W/(cm²·K)',
                    'position'    => 'right',
                    'description' => 'وات بر سانتی‌متر مربع کلوین یک واحد ضریب انتقال حرارت است.',
                ],
            ],
        ]);
    }
}

