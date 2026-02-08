<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class MassFlowUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kilogram per Second (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Second',
                    'code'        => 'kg/s',
                    'position'    => 'left',
                    'description' => 'The kilogram per second is the SI derived unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر ثانیه',
                    'code'        => 'kg/s',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر ثانیه واحد مشتق‌شده SI برای نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Kilogram per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.000277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Hour',
                    'code'        => 'kg/h',
                    'position'    => 'left',
                    'description' => 'A kilogram per hour is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر ساعت',
                    'code'        => 'kg/h',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر ساعت یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Kilogram per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.0166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Minute',
                    'code'        => 'kg/min',
                    'position'    => 'left',
                    'description' => 'A kilogram per minute is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر دقیقه',
                    'code'        => 'kg/min',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر دقیقه یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Gram per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram per Second',
                    'code'        => 'g/s',
                    'position'    => 'left',
                    'description' => 'A gram per second is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'گرم بر ثانیه',
                    'code'        => 'g/s',
                    'position'    => 'right',
                    'description' => 'گرم بر ثانیه یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Gram per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.0000166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram per Minute',
                    'code'        => 'g/min',
                    'position'    => 'left',
                    'description' => 'A gram per minute is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'گرم بر دقیقه',
                    'code'        => 'g/min',
                    'position'    => 'right',
                    'description' => 'گرم بر دقیقه یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Ton per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.277778,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ton per Hour',
                    'code'        => 't/h',
                    'position'    => 'left',
                    'description' => 'A ton per hour is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'تن بر ساعت',
                    'code'        => 't/h',
                    'position'    => 'right',
                    'description' => 'تن بر ساعت یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Ton per Day
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.0115741,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ton per Day',
                    'code'        => 't/d',
                    'position'    => 'left',
                    'description' => 'A ton per day is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'تن بر روز',
                    'code'        => 't/d',
                    'position'    => 'right',
                    'description' => 'تن بر روز یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Pound per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.453592,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Second',
                    'code'        => 'lb/s',
                    'position'    => 'left',
                    'description' => 'A pound per second is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'پوند بر ثانیه',
                    'code'        => 'lb/s',
                    'position'    => 'right',
                    'description' => 'پوند بر ثانیه یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Pound per Hour
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.000125998,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Hour',
                    'code'        => 'lb/h',
                    'position'    => 'left',
                    'description' => 'A pound per hour is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'پوند بر ساعت',
                    'code'        => 'lb/h',
                    'position'    => 'right',
                    'description' => 'پوند بر ساعت یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);

        // Pound per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::MASS_FLOW(),
            'value'       => 0.00755987,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Minute',
                    'code'        => 'lb/min',
                    'position'    => 'left',
                    'description' => 'A pound per minute is a unit of mass flow rate.',
                ],
                'fa' => [
                    'name'        => 'پوند بر دقیقه',
                    'code'        => 'lb/min',
                    'position'    => 'right',
                    'description' => 'پوند بر دقیقه یک واحد نرخ جریان جرمی است.',
                ],
            ],
        ]);
    }
}

