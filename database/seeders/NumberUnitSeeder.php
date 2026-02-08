<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class NumberUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Unit (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Unit',
                    'code'        => 'unit',
                    'position'    => 'right',
                    'description' => 'A single unit or piece.',
                ],
                'fa' => [
                    'name'        => 'عدد',
                    'code'        => 'عدد',
                    'position'    => 'right',
                    'description' => 'یک واحد یا قطعه.',
                ],
            ],
        ]);

        // Dozen
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 12,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dozen',
                    'code'        => 'dz',
                    'position'    => 'right',
                    'description' => 'A dozen is a grouping of twelve.',
                ],
                'fa' => [
                    'name'        => 'دوجین',
                    'code'        => 'دوجین',
                    'position'    => 'right',
                    'description' => 'دوجین یک گروه‌بندی ۱۲ تایی است.',
                ],
            ],
        ]);

        // Pair
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 2,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pair',
                    'code'        => 'pr',
                    'position'    => 'right',
                    'description' => 'A pair is a grouping of two.',
                ],
                'fa' => [
                    'name'        => 'جفت',
                    'code'        => 'جفت',
                    'position'    => 'right',
                    'description' => 'جفت یک گروه‌بندی ۲ تایی است.',
                ],
            ],
        ]);

        // Score
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 20,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Score',
                    'code'        => 'score',
                    'position'    => 'right',
                    'description' => 'A score is a grouping of twenty.',
                ],
                'fa' => [
                    'name'        => 'بیست‌تایی',
                    'code'        => 'بیست‌تایی',
                    'position'    => 'right',
                    'description' => 'یک گروه‌بندی ۲۰ تایی است.',
                ],
            ],
        ]);

        // Gross
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 144,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gross',
                    'code'        => 'gr',
                    'position'    => 'right',
                    'description' => 'A gross is a grouping of 144 (12 dozen).',
                ],
                'fa' => [
                    'name'        => 'گروس',
                    'code'        => 'گروس',
                    'position'    => 'right',
                    'description' => 'گروس یک گروه‌بندی ۱۴۴ تایی (۱۲ دوجین) است.',
                ],
            ],
        ]);

        // Hundred
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 100,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Hundred',
                    'code'        => 'C',
                    'position'    => 'right',
                    'description' => 'A hundred is a grouping of 100.',
                ],
                'fa' => [
                    'name'        => 'صدتایی',
                    'code'        => 'صد',
                    'position'    => 'right',
                    'description' => 'یک گروه‌بندی ۱۰۰ تایی است.',
                ],
            ],
        ]);

        // Thousand
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Thousand',
                    'code'        => 'K',
                    'position'    => 'right',
                    'description' => 'A thousand is a grouping of 1000.',
                ],
                'fa' => [
                    'name'        => 'هزارتایی',
                    'code'        => 'هزار',
                    'position'    => 'right',
                    'description' => 'یک گروه‌بندی ۱۰۰۰ تایی است.',
                ],
            ],
        ]);

        // Million
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Million',
                    'code'        => 'M',
                    'position'    => 'right',
                    'description' => 'A million is a grouping of 1,000,000.',
                ],
                'fa' => [
                    'name'        => 'میلیون',
                    'code'        => 'میلیون',
                    'position'    => 'right',
                    'description' => 'یک گروه‌بندی ۱،۰۰۰،۰۰۰ تایی است.',
                ],
            ],
        ]);

        // Ream (500 sheets of paper)
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 500,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ream',
                    'code'        => 'ream',
                    'position'    => 'right',
                    'description' => 'A ream is 500 sheets of paper.',
                ],
                'fa' => [
                    'name'        => 'بند',
                    'code'        => 'بند',
                    'position'    => 'right',
                    'description' => 'بند برابر با ۵۰۰ برگ کاغذ است.',
                ],
            ],
        ]);

        // Quire (25 sheets of paper)
        UnitConverter::store([
            'type'        => UnitTypeEnum::NUMBER(),
            'value'       => 25,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Quire',
                    'code'        => 'quire',
                    'position'    => 'right',
                    'description' => 'A quire is 25 sheets of paper.',
                ],
                'fa' => [
                    'name'        => 'دسته',
                    'code'        => 'دسته',
                    'position'    => 'right',
                    'description' => 'دسته برابر با ۲۵ برگ کاغذ است.',
                ],
            ],
        ]);
    }
}

