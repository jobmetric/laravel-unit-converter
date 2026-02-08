<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ViscosityUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pascal Second (base unit for dynamic viscosity)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pascal Second',
                    'code'        => 'Pa·s',
                    'position'    => 'left',
                    'description' => 'The pascal second is the SI unit of dynamic viscosity.',
                ],
                'fa' => [
                    'name'        => 'پاسکال ثانیه',
                    'code'        => 'Pa·s',
                    'position'    => 'right',
                    'description' => 'پاسکال ثانیه واحد SI برای ویسکوزیته دینامیکی است.',
                ],
            ],
        ]);

        // Millipascal Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millipascal Second',
                    'code'        => 'mPa·s',
                    'position'    => 'left',
                    'description' => 'A millipascal second is one thousandth of a pascal second.',
                ],
                'fa' => [
                    'name'        => 'میلی‌پاسکال ثانیه',
                    'code'        => 'mPa·s',
                    'position'    => 'right',
                    'description' => 'میلی‌پاسکال ثانیه یک هزارم پاسکال ثانیه است.',
                ],
            ],
        ]);

        // Poise
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 0.1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Poise',
                    'code'        => 'P',
                    'position'    => 'left',
                    'description' => 'The poise is the CGS unit of dynamic viscosity.',
                ],
                'fa' => [
                    'name'        => 'پواز',
                    'code'        => 'P',
                    'position'    => 'right',
                    'description' => 'پواز واحد CGS برای ویسکوزیته دینامیکی است.',
                ],
            ],
        ]);

        // Centipoise
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centipoise',
                    'code'        => 'cP',
                    'position'    => 'left',
                    'description' => 'A centipoise is one hundredth of a poise.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌پواز',
                    'code'        => 'cP',
                    'position'    => 'right',
                    'description' => 'سانتی‌پواز یک صدم پواز است.',
                ],
            ],
        ]);

        // Stokes (kinematic viscosity)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 0.0001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Stokes',
                    'code'        => 'St',
                    'position'    => 'left',
                    'description' => 'The stokes is the CGS unit of kinematic viscosity.',
                ],
                'fa' => [
                    'name'        => 'استوکس',
                    'code'        => 'St',
                    'position'    => 'right',
                    'description' => 'استوکس واحد CGS برای ویسکوزیته سینماتیکی است.',
                ],
            ],
        ]);

        // Centistokes
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centistokes',
                    'code'        => 'cSt',
                    'position'    => 'left',
                    'description' => 'A centistokes is one hundredth of a stokes.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌استوکس',
                    'code'        => 'cSt',
                    'position'    => 'right',
                    'description' => 'سانتی‌استوکس یک صدم استوکس است.',
                ],
            ],
        ]);

        // Square Meter per Second (kinematic viscosity)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Meter per Second',
                    'code'        => 'm²/s',
                    'position'    => 'left',
                    'description' => 'The square meter per second is the SI unit of kinematic viscosity.',
                ],
                'fa' => [
                    'name'        => 'متر مربع بر ثانیه',
                    'code'        => 'm²/s',
                    'position'    => 'right',
                    'description' => 'متر مربع بر ثانیه واحد SI برای ویسکوزیته سینماتیکی است.',
                ],
            ],
        ]);

        // Square Centimeter per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 0.0001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Square Centimeter per Second',
                    'code'        => 'cm²/s',
                    'position'    => 'left',
                    'description' => 'A square centimeter per second is a unit of kinematic viscosity.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌متر مربع بر ثانیه',
                    'code'        => 'cm²/s',
                    'position'    => 'right',
                    'description' => 'سانتی‌متر مربع بر ثانیه یک واحد ویسکوزیته سینماتیکی است.',
                ],
            ],
        ]);

        // Kilogram per Meter Second (equals 1 Pa·s)
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 1.00002,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Meter Second',
                    'code'        => 'kg/(m·s)',
                    'position'    => 'left',
                    'description' => 'A kilogram per meter second equals one pascal second.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر متر ثانیه',
                    'code'        => 'kg/(m·s)',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر متر ثانیه برابر با یک پاسکال ثانیه است.',
                ],
            ],
        ]);

        // Pound per Foot Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::VISCOSITY(),
            'value'       => 1.48816,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound per Foot Second',
                    'code'        => 'lb/(ft·s)',
                    'position'    => 'left',
                    'description' => 'A pound per foot second is a unit of dynamic viscosity.',
                ],
                'fa' => [
                    'name'        => 'پوند بر فوت ثانیه',
                    'code'        => 'lb/(ft·s)',
                    'position'    => 'right',
                    'description' => 'پوند بر فوت ثانیه یک واحد ویسکوزیته دینامیکی است.',
                ],
            ],
        ]);
    }
}

