<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class VolumetricFlowUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cubic Meter per Second (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Meter per Second',
                    'code'        => 'm³/s',
                    'position'    => 'left',
                    'description' => 'The cubic meter per second is the SI derived unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'متر مکعب بر ثانیه',
                    'code'        => 'm³/s',
                    'position'    => 'right',
                    'description' => 'متر مکعب بر ثانیه واحد مشتق‌شده SI برای نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Cubic Meter per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.000277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Meter per Hour',
                    'code'        => 'm³/h',
                    'position'    => 'left',
                    'description' => 'A cubic meter per hour is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'متر مکعب بر ساعت',
                    'code'        => 'm³/h',
                    'position'    => 'right',
                    'description' => 'متر مکعب بر ساعت یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Cubic Meter per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.0166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Meter per Minute',
                    'code'        => 'm³/min',
                    'position'    => 'left',
                    'description' => 'A cubic meter per minute is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'متر مکعب بر دقیقه',
                    'code'        => 'm³/min',
                    'position'    => 'right',
                    'description' => 'متر مکعب بر دقیقه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Liter per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter per Second',
                    'code'        => 'L/s',
                    'position'    => 'left',
                    'description' => 'A liter per second is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'لیتر بر ثانیه',
                    'code'        => 'L/s',
                    'position'    => 'right',
                    'description' => 'لیتر بر ثانیه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Liter per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.0000166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter per Minute',
                    'code'        => 'L/min',
                    'position'    => 'left',
                    'description' => 'A liter per minute is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'لیتر بر دقیقه',
                    'code'        => 'L/min',
                    'position'    => 'right',
                    'description' => 'لیتر بر دقیقه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Liter per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.000000277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter per Hour',
                    'code'        => 'L/h',
                    'position'    => 'left',
                    'description' => 'A liter per hour is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'لیتر بر ساعت',
                    'code'        => 'L/h',
                    'position'    => 'right',
                    'description' => 'لیتر بر ساعت یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Gallon per Minute (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.0000630902,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gallon per Minute (US)',
                    'code'        => 'GPM',
                    'position'    => 'left',
                    'description' => 'A US gallon per minute is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'گالن بر دقیقه (آمریکایی)',
                    'code'        => 'GPM',
                    'position'    => 'right',
                    'description' => 'گالن آمریکایی بر دقیقه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Gallon per Hour (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.00000105150,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gallon per Hour (US)',
                    'code'        => 'GPH',
                    'position'    => 'left',
                    'description' => 'A US gallon per hour is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'گالن بر ساعت (آمریکایی)',
                    'code'        => 'GPH',
                    'position'    => 'right',
                    'description' => 'گالن آمریکایی بر ساعت یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Cubic Foot per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.0283168,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Foot per Second',
                    'code'        => 'ft³/s',
                    'position'    => 'left',
                    'description' => 'A cubic foot per second is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'فوت مکعب بر ثانیه',
                    'code'        => 'ft³/s',
                    'position'    => 'right',
                    'description' => 'فوت مکعب بر ثانیه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Cubic Foot per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.000471947,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cubic Foot per Minute',
                    'code'        => 'CFM',
                    'position'    => 'left',
                    'description' => 'A cubic foot per minute is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'فوت مکعب بر دقیقه',
                    'code'        => 'CFM',
                    'position'    => 'right',
                    'description' => 'فوت مکعب بر دقیقه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);

        // Milliliter per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::VOLUMETRIC_FLOW(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliliter per Second',
                    'code'        => 'mL/s',
                    'position'    => 'left',
                    'description' => 'A milliliter per second is a unit of volumetric flow rate.',
                ],
                'fa' => [
                    'name'        => 'میلی‌لیتر بر ثانیه',
                    'code'        => 'mL/s',
                    'position'    => 'right',
                    'description' => 'میلی‌لیتر بر ثانیه یک واحد نرخ جریان حجمی است.',
                ],
            ],
        ]);
    }
}

