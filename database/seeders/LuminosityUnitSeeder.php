<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class LuminosityUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Candela (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Candela',
                    'code'        => 'cd',
                    'position'    => 'left',
                    'description' => 'The candela is the SI base unit of luminous intensity.',
                ],
                'fa' => [
                    'name'        => 'کاندلا',
                    'code'        => 'cd',
                    'position'    => 'right',
                    'description' => 'کاندلا واحد پایه SI برای شدت نورانی است.',
                ],
            ],
        ]);

        // Lumen (luminous flux)
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Lumen',
                    'code'        => 'lm',
                    'position'    => 'left',
                    'description' => 'The lumen is the SI derived unit of luminous flux.',
                ],
                'fa' => [
                    'name'        => 'لومن',
                    'code'        => 'lm',
                    'position'    => 'right',
                    'description' => 'لومن واحد مشتق‌شده SI برای شار نورانی است.',
                ],
            ],
        ]);

        // Lux (illuminance)
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 1.00002,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Lux',
                    'code'        => 'lx',
                    'position'    => 'left',
                    'description' => 'The lux is the SI derived unit of illuminance.',
                ],
                'fa' => [
                    'name'        => 'لوکس',
                    'code'        => 'lx',
                    'position'    => 'right',
                    'description' => 'لوکس واحد مشتق‌شده SI برای روشنایی است.',
                ],
            ],
        ]);

        // Foot-candle
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 10.7639,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot-candle',
                    'code'        => 'fc',
                    'position'    => 'left',
                    'description' => 'The foot-candle is a non-SI unit of illuminance.',
                ],
                'fa' => [
                    'name'        => 'فوت-شمع',
                    'code'        => 'fc',
                    'position'    => 'right',
                    'description' => 'فوت-شمع یک واحد غیر SI برای روشنایی است.',
                ],
            ],
        ]);

        // Phot
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 10000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Phot',
                    'code'        => 'ph',
                    'position'    => 'left',
                    'description' => 'The phot is a CGS unit of illuminance.',
                ],
                'fa' => [
                    'name'        => 'فوت',
                    'code'        => 'ph',
                    'position'    => 'right',
                    'description' => 'فوت یک واحد CGS برای روشنایی است.',
                ],
            ],
        ]);

        // Nit (luminance)
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 1.00003,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Nit',
                    'code'        => 'nt',
                    'position'    => 'left',
                    'description' => 'The nit is a unit of luminance equal to one candela per square meter.',
                ],
                'fa' => [
                    'name'        => 'نیت',
                    'code'        => 'nt',
                    'position'    => 'right',
                    'description' => 'نیت یک واحد درخشندگی برابر با یک کاندلا بر متر مربع است.',
                ],
            ],
        ]);

        // Stilb
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 10000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Stilb',
                    'code'        => 'sb',
                    'position'    => 'left',
                    'description' => 'The stilb is a CGS unit of luminance.',
                ],
                'fa' => [
                    'name'        => 'استیلب',
                    'code'        => 'sb',
                    'position'    => 'right',
                    'description' => 'استیلب یک واحد CGS برای درخشندگی است.',
                ],
            ],
        ]);

        // Lambert
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 3183.1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Lambert',
                    'code'        => 'L',
                    'position'    => 'left',
                    'description' => 'The lambert is a CGS unit of luminance.',
                ],
                'fa' => [
                    'name'        => 'لامبرت',
                    'code'        => 'L',
                    'position'    => 'right',
                    'description' => 'لامبرت یک واحد CGS برای درخشندگی است.',
                ],
            ],
        ]);

        // Foot-lambert
        UnitConverter::store([
            'type'        => UnitTypeEnum::LUMINOSITY(),
            'value'       => 3.42626,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Foot-lambert',
                    'code'        => 'fL',
                    'position'    => 'left',
                    'description' => 'The foot-lambert is a unit of luminance.',
                ],
                'fa' => [
                    'name'        => 'فوت-لامبرت',
                    'code'        => 'fL',
                    'position'    => 'right',
                    'description' => 'فوت-لامبرت یک واحد درخشندگی است.',
                ],
            ],
        ]);
    }
}

