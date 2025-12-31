<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class TemperatureUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Celsius
        UnitConverter::store([
            'type' => UnitTypeEnum::TEMPERATURE(),
            'value' => 1,
            'status' => true,
            'translation' => [
                'name' => 'Celsius',
                'code' => '°C',
                'position' => 'left',
                'description' => 'The Celsius scale, also known as the centigrade scale, is a temperature scale used by the International System of Units (SI).',
            ],
        ]);
    }
}
