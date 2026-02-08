<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class ConcentrationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mole per Liter (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mole per Liter',
                    'code'        => 'mol/L',
                    'position'    => 'left',
                    'description' => 'Mole per liter is the SI unit of molar concentration.',
                ],
                'fa' => [
                    'name'        => 'مول بر لیتر',
                    'code'        => 'mol/L',
                    'position'    => 'right',
                    'description' => 'مول بر لیتر واحد SI برای غلظت مولار است.',
                ],
            ],
        ]);

        // Millimole per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millimole per Liter',
                    'code'        => 'mmol/L',
                    'position'    => 'left',
                    'description' => 'A millimole per liter is one thousandth of a mole per liter.',
                ],
                'fa' => [
                    'name'        => 'میلی‌مول بر لیتر',
                    'code'        => 'mmol/L',
                    'position'    => 'right',
                    'description' => 'میلی‌مول بر لیتر یک هزارم مول بر لیتر است.',
                ],
            ],
        ]);

        // Micromole per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Micromole per Liter',
                    'code'        => 'µmol/L',
                    'position'    => 'left',
                    'description' => 'A micromole per liter is one millionth of a mole per liter.',
                ],
                'fa' => [
                    'name'        => 'میکرومول بر لیتر',
                    'code'        => 'µmol/L',
                    'position'    => 'right',
                    'description' => 'میکرومول بر لیتر یک میلیونم مول بر لیتر است.',
                ],
            ],
        ]);

        // Parts per Million
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Parts per Million',
                    'code'        => 'ppm',
                    'position'    => 'left',
                    'description' => 'Parts per million is a unit of concentration.',
                ],
                'fa' => [
                    'name'        => 'قسمت در میلیون',
                    'code'        => 'ppm',
                    'position'    => 'right',
                    'description' => 'قسمت در میلیون یک واحد غلظت است.',
                ],
            ],
        ]);

        // Parts per Billion
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Parts per Billion',
                    'code'        => 'ppb',
                    'position'    => 'left',
                    'description' => 'Parts per billion is a unit of concentration.',
                ],
                'fa' => [
                    'name'        => 'قسمت در میلیارد',
                    'code'        => 'ppb',
                    'position'    => 'right',
                    'description' => 'قسمت در میلیارد یک واحد غلظت است.',
                ],
            ],
        ]);

        // Parts per Trillion
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.000000000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Parts per Trillion',
                    'code'        => 'ppt',
                    'position'    => 'left',
                    'description' => 'Parts per trillion is a unit of concentration.',
                ],
                'fa' => [
                    'name'        => 'قسمت در تریلیون',
                    'code'        => 'ppt',
                    'position'    => 'right',
                    'description' => 'قسمت در تریلیون یک واحد غلظت است.',
                ],
            ],
        ]);

        // Percent (mass/volume)
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 10000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Percent',
                    'code'        => '%',
                    'position'    => 'right',
                    'description' => 'Percent is a unit of concentration equal to 10,000 ppm.',
                ],
                'fa' => [
                    'name'        => 'درصد',
                    'code'        => '%',
                    'position'    => 'left',
                    'description' => 'درصد یک واحد غلظت برابر با ۱۰،۰۰۰ ppm است.',
                ],
            ],
        ]);

        // Gram per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram per Liter',
                    'code'        => 'g/L',
                    'position'    => 'left',
                    'description' => 'Gram per liter is a unit of mass concentration.',
                ],
                'fa' => [
                    'name'        => 'گرم بر لیتر',
                    'code'        => 'g/L',
                    'position'    => 'right',
                    'description' => 'گرم بر لیتر یک واحد غلظت جرمی است.',
                ],
            ],
        ]);

        // Milligram per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milligram per Liter',
                    'code'        => 'mg/L',
                    'position'    => 'left',
                    'description' => 'Milligram per liter is a unit of mass concentration.',
                ],
                'fa' => [
                    'name'        => 'میلی‌گرم بر لیتر',
                    'code'        => 'mg/L',
                    'position'    => 'right',
                    'description' => 'میلی‌گرم بر لیتر یک واحد غلظت جرمی است.',
                ],
            ],
        ]);

        // Microgram per Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microgram per Liter',
                    'code'        => 'µg/L',
                    'position'    => 'left',
                    'description' => 'Microgram per liter is a unit of mass concentration.',
                ],
                'fa' => [
                    'name'        => 'میکروگرم بر لیتر',
                    'code'        => 'µg/L',
                    'position'    => 'right',
                    'description' => 'میکروگرم بر لیتر یک واحد غلظت جرمی است.',
                ],
            ],
        ]);

        // Kilogram per Cubic Meter
        UnitConverter::store([
            'type'        => UnitTypeEnum::CONCENTRATION(),
            'value'       => 1.00002,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram per Cubic Meter',
                    'code'        => 'kg/m³',
                    'position'    => 'left',
                    'description' => 'Kilogram per cubic meter is a unit of mass concentration.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم بر متر مکعب',
                    'code'        => 'kg/m³',
                    'position'    => 'right',
                    'description' => 'کیلوگرم بر متر مکعب یک واحد غلظت جرمی است.',
                ],
            ],
        ]);
    }
}

