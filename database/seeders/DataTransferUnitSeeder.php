<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class DataTransferUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bit per Second (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Bit per Second',
                    'code'        => 'bps',
                    'position'    => 'left',
                    'description' => 'Bit per second is the base unit of data transfer rate.',
                ],
                'fa' => [
                    'name'        => 'بیت بر ثانیه',
                    'code'        => 'bps',
                    'position'    => 'right',
                    'description' => 'بیت بر ثانیه واحد پایه نرخ انتقال داده است.',
                ],
            ],
        ]);

        // Kilobit per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilobit per Second',
                    'code'        => 'Kbps',
                    'position'    => 'left',
                    'description' => 'A kilobit per second is 1,000 bits per second.',
                ],
                'fa' => [
                    'name'        => 'کیلوبیت بر ثانیه',
                    'code'        => 'Kbps',
                    'position'    => 'right',
                    'description' => 'کیلوبیت بر ثانیه برابر با ۱۰۰۰ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Megabit per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megabit per Second',
                    'code'        => 'Mbps',
                    'position'    => 'left',
                    'description' => 'A megabit per second is 1,000,000 bits per second.',
                ],
                'fa' => [
                    'name'        => 'مگابیت بر ثانیه',
                    'code'        => 'Mbps',
                    'position'    => 'right',
                    'description' => 'مگابیت بر ثانیه برابر با ۱،۰۰۰،۰۰۰ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Gigabit per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigabit per Second',
                    'code'        => 'Gbps',
                    'position'    => 'left',
                    'description' => 'A gigabit per second is 1,000,000,000 bits per second.',
                ],
                'fa' => [
                    'name'        => 'گیگابیت بر ثانیه',
                    'code'        => 'Gbps',
                    'position'    => 'right',
                    'description' => 'گیگابیت بر ثانیه برابر با ۱،۰۰۰،۰۰۰،۰۰۰ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Byte per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 8,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Byte per Second',
                    'code'        => 'B/s',
                    'position'    => 'left',
                    'description' => 'A byte per second is 8 bits per second.',
                ],
                'fa' => [
                    'name'        => 'بایت بر ثانیه',
                    'code'        => 'B/s',
                    'position'    => 'right',
                    'description' => 'بایت بر ثانیه برابر با ۸ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Kilobyte per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 8000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilobyte per Second',
                    'code'        => 'KB/s',
                    'position'    => 'left',
                    'description' => 'A kilobyte per second is 8,000 bits per second.',
                ],
                'fa' => [
                    'name'        => 'کیلوبایت بر ثانیه',
                    'code'        => 'KB/s',
                    'position'    => 'right',
                    'description' => 'کیلوبایت بر ثانیه برابر با ۸۰۰۰ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Megabyte per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 8000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megabyte per Second',
                    'code'        => 'MB/s',
                    'position'    => 'left',
                    'description' => 'A megabyte per second is 8,000,000 bits per second.',
                ],
                'fa' => [
                    'name'        => 'مگابایت بر ثانیه',
                    'code'        => 'MB/s',
                    'position'    => 'right',
                    'description' => 'مگابایت بر ثانیه برابر با ۸،۰۰۰،۰۰۰ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Gigabyte per Second
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 8000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigabyte per Second',
                    'code'        => 'GB/s',
                    'position'    => 'left',
                    'description' => 'A gigabyte per second is 8,000,000,000 bits per second.',
                ],
                'fa' => [
                    'name'        => 'گیگابایت بر ثانیه',
                    'code'        => 'GB/s',
                    'position'    => 'right',
                    'description' => 'گیگابایت بر ثانیه برابر با ۸،۰۰۰،۰۰۰،۰۰۰ بیت بر ثانیه است.',
                ],
            ],
        ]);

        // Kibibit per Second (binary)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 1024,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kibibit per Second',
                    'code'        => 'Kibps',
                    'position'    => 'left',
                    'description' => 'A kibibit per second is 1,024 bits per second (binary).',
                ],
                'fa' => [
                    'name'        => 'کیبی‌بیت بر ثانیه',
                    'code'        => 'Kibps',
                    'position'    => 'right',
                    'description' => 'کیبی‌بیت بر ثانیه برابر با ۱۰۲۴ بیت بر ثانیه (دودویی) است.',
                ],
            ],
        ]);

        // Mebibit per Second (binary)
        UnitConverter::store([
            'type'        => UnitTypeEnum::DATA_TRANSFER(),
            'value'       => 1048576,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Mebibit per Second',
                    'code'        => 'Mibps',
                    'position'    => 'left',
                    'description' => 'A mebibit per second is 1,048,576 bits per second (binary).',
                ],
                'fa' => [
                    'name'        => 'مبی‌بیت بر ثانیه',
                    'code'        => 'Mibps',
                    'position'    => 'right',
                    'description' => 'مبی‌بیت بر ثانیه برابر با ۱،۰۴۸،۵۷۶ بیت بر ثانیه (دودویی) است.',
                ],
            ],
        ]);
    }
}

