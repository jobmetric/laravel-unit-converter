<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class DataStorageUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Byte (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Byte',
                    'code'        => 'B',
                    'position'    => 'left',
                    'description' => 'The byte is the base unit of digital information storage.',
                ],
                'fa' => [
                    'name'        => 'بایت',
                    'code'        => 'B',
                    'position'    => 'right',
                    'description' => 'بایت واحد پایه ذخیره‌سازی اطلاعات دیجیتال است.',
                ],
            ],
        ]);

        // Bit
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 0.125,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Bit',
                    'code'        => 'b',
                    'position'    => 'left',
                    'description' => 'A bit is the smallest unit of data, equal to 1/8 of a byte.',
                ],
                'fa' => [
                    'name'        => 'بیت',
                    'code'        => 'b',
                    'position'    => 'right',
                    'description' => 'بیت کوچکترین واحد داده است، برابر با ۱/۸ بایت.',
                ],
            ],
        ]);

        // Kilobyte (decimal)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilobyte',
                    'code'        => 'KB',
                    'position'    => 'left',
                    'description' => 'A kilobyte is 1,000 bytes (decimal).',
                ],
                'fa' => [
                    'name'        => 'کیلوبایت',
                    'code'        => 'KB',
                    'position'    => 'right',
                    'description' => 'کیلوبایت برابر با ۱۰۰۰ بایت (دهدهی) است.',
                ],
            ],
        ]);

        // Megabyte (decimal)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megabyte',
                    'code'        => 'MB',
                    'position'    => 'left',
                    'description' => 'A megabyte is 1,000,000 bytes (decimal).',
                ],
                'fa' => [
                    'name'        => 'مگابایت',
                    'code'        => 'MB',
                    'position'    => 'right',
                    'description' => 'مگابایت برابر با ۱،۰۰۰،۰۰۰ بایت (دهدهی) است.',
                ],
            ],
        ]);

        // Gigabyte (decimal)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigabyte',
                    'code'        => 'GB',
                    'position'    => 'left',
                    'description' => 'A gigabyte is 1,000,000,000 bytes (decimal).',
                ],
                'fa' => [
                    'name'        => 'گیگابایت',
                    'code'        => 'GB',
                    'position'    => 'right',
                    'description' => 'گیگابایت برابر با ۱،۰۰۰،۰۰۰،۰۰۰ بایت (دهدهی) است.',
                ],
            ],
        ]);

        // Kibibyte (binary)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1024,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kibibyte',
                    'code'        => 'KiB',
                    'position'    => 'left',
                    'description' => 'A kibibyte is 1,024 bytes (binary).',
                ],
                'fa' => [
                    'name'        => 'کیبی‌بایت',
                    'code'        => 'KiB',
                    'position'    => 'right',
                    'description' => 'کیبی‌بایت برابر با ۱۰۲۴ بایت (دودویی) است.',
                ],
            ],
        ]);

        // Mebibyte (binary)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1048576,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mebibyte',
                    'code'        => 'MiB',
                    'position'    => 'left',
                    'description' => 'A mebibyte is 1,048,576 bytes (binary).',
                ],
                'fa' => [
                    'name'        => 'مبی‌بایت',
                    'code'        => 'MiB',
                    'position'    => 'right',
                    'description' => 'مبی‌بایت برابر با ۱،۰۴۸،۵۷۶ بایت (دودویی) است.',
                ],
            ],
        ]);

        // Gibibyte (binary)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_STORAGE(),
            'value'       => 1073741824,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gibibyte',
                    'code'        => 'GiB',
                    'position'    => 'left',
                    'description' => 'A gibibyte is 1,073,741,824 bytes (binary).',
                ],
                'fa' => [
                    'name'        => 'گیبی‌بایت',
                    'code'        => 'GiB',
                    'position'    => 'right',
                    'description' => 'گیبی‌بایت برابر با ۱،۰۷۳،۷۴۱،۸۲۴ بایت (دودویی) است.',
                ],
            ],
        ]);
    }
}
