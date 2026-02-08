<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class MagneticFluxUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Weber (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Weber',
                    'code'        => 'Wb',
                    'position'    => 'left',
                    'description' => 'The weber is the SI derived unit of magnetic flux.',
                ],
                'fa' => [
                    'name'        => 'وبر',
                    'code'        => 'Wb',
                    'position'    => 'right',
                    'description' => 'وبر واحد مشتق‌شده SI برای شار مغناطیسی است.',
                ],
            ],
        ]);

        // Milliweber
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliweber',
                    'code'        => 'mWb',
                    'position'    => 'left',
                    'description' => 'A milliweber is one thousandth of a weber.',
                ],
                'fa' => [
                    'name'        => 'میلی‌وبر',
                    'code'        => 'mWb',
                    'position'    => 'right',
                    'description' => 'میلی‌وبر یک هزارم وبر است.',
                ],
            ],
        ]);

        // Microweber
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microweber',
                    'code'        => 'µWb',
                    'position'    => 'left',
                    'description' => 'A microweber is one millionth of a weber.',
                ],
                'fa' => [
                    'name'        => 'میکرووبر',
                    'code'        => 'µWb',
                    'position'    => 'right',
                    'description' => 'میکرووبر یک میلیونم وبر است.',
                ],
            ],
        ]);

        // Kiloweber
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kiloweber',
                    'code'        => 'kWb',
                    'position'    => 'left',
                    'description' => 'A kiloweber is 1,000 webers.',
                ],
                'fa' => [
                    'name'        => 'کیلووبر',
                    'code'        => 'kWb',
                    'position'    => 'right',
                    'description' => 'کیلووبر برابر با ۱۰۰۰ وبر است.',
                ],
            ],
        ]);

        // Maxwell
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 0.00000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Maxwell',
                    'code'        => 'Mx',
                    'position'    => 'left',
                    'description' => 'The maxwell is the CGS unit of magnetic flux.',
                ],
                'fa' => [
                    'name'        => 'ماکسول',
                    'code'        => 'Mx',
                    'position'    => 'right',
                    'description' => 'ماکسول واحد CGS برای شار مغناطیسی است.',
                ],
            ],
        ]);

        // Tesla Square Meter (equals 1 Weber)
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Tesla Square Meter',
                    'code'        => 'T·m²',
                    'position'    => 'left',
                    'description' => 'A tesla square meter equals one weber.',
                ],
                'fa' => [
                    'name'        => 'تسلا متر مربع',
                    'code'        => 'T·m²',
                    'position'    => 'right',
                    'description' => 'تسلا متر مربع برابر با یک وبر است.',
                ],
            ],
        ]);

        // Gauss Square Centimeter
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 0.00000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gauss Square Centimeter',
                    'code'        => 'G·cm²',
                    'position'    => 'left',
                    'description' => 'A gauss square centimeter is a CGS unit of magnetic flux.',
                ],
                'fa' => [
                    'name'        => 'گاوس سانتی‌متر مربع',
                    'code'        => 'G·cm²',
                    'position'    => 'right',
                    'description' => 'گاوس سانتی‌متر مربع یک واحد CGS برای شار مغناطیسی است.',
                ],
            ],
        ]);

        // Volt Second (equals 1 Weber)
        UnitConverter::store([
            'type'        => UnitTypeEnum::MAGNETIC_FLUX(),
            'value'       => 1.00002,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Volt Second',
                    'code'        => 'V·s',
                    'position'    => 'left',
                    'description' => 'A volt second equals one weber.',
                ],
                'fa' => [
                    'name'        => 'ولت ثانیه',
                    'code'        => 'V·s',
                    'position'    => 'right',
                    'description' => 'ولت ثانیه برابر با یک وبر است.',
                ],
            ],
        ]);
    }
}

