<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class WeightUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // gram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram',
                    'code'        => 'g',
                    'position'    => 'left',
                    'description' => 'The gram is a metric system unit of mass.',
                ],
                'fa' => [
                    'name'        => 'گرم',
                    'code'        => 'گ',
                    'position'    => 'right',
                    'description' => 'گرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // kilogram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram',
                    'code'        => 'kg',
                    'position'    => 'left',
                    'description' => 'The kilogram is the base unit of mass in the International System of Units.',
                ],
                'fa' => [
                    'name'        => 'کیلوگرم',
                    'code'        => 'کیلو',
                    'position'    => 'right',
                    'description' => 'کیلوگرم واحد پایه جرم در سیستم بین‌المللی واحدها است.',
                ],
            ],
        ]);

        // ton
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ton',
                    'code'        => 't',
                    'position'    => 'left',
                    'description' => 'The ton is a unit of weight.',
                ],
                'fa' => [
                    'name'        => 'تن',
                    'code'        => 'تن',
                    'position'    => 'right',
                    'description' => 'تن یک واحد وزن است.',
                ],
            ],
        ]);

        // pound
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 453.592,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pound',
                    'code'        => 'lb',
                    'position'    => 'left',
                    'description' => 'The pound or pound-mass is a unit of mass used in the imperial, United States customary and other systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'پوند',
                    'code'        => 'پوند',
                    'position'    => 'right',
                    'description' => 'پوند یک واحد جرم است که در سیستم امپریال و سیستم‌های اندازه‌گیری آمریکا استفاده می‌شود.',
                ],
            ],
        ]);

        // carat
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 0.2,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Carat',
                    'code'        => 'ct',
                    'position'    => 'left',
                    'description' => 'The carat is a unit of mass used for measuring gemstones and pearls.',
                ],
                'fa' => [
                    'name'        => 'قیراط',
                    'code'        => 'قیراط',
                    'position'    => 'right',
                    'description' => 'قیراط یک واحد جرم است که برای اندازه‌گیری سنگ‌های قیمتی و مروارید استفاده می‌شود.',
                ],
            ],
        ]);

        // ounce
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 28.3495,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Ounce',
                    'code'        => 'oz',
                    'position'    => 'left',
                    'description' => 'The ounce is a unit of mass used in most British derived customary systems of measurement.',
                ],
                'fa' => [
                    'name'        => 'اونس',
                    'code'        => 'اونس',
                    'position'    => 'right',
                    'description' => 'اونس یک واحد جرم است که در اکثر سیستم‌های اندازه‌گیری مشتق شده از بریتانیا استفاده می‌شود.',
                ],
            ],
        ]);

        // milligram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milligram',
                    'code'        => 'mg',
                    'position'    => 'left',
                    'description' => 'The milligram is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'میلی‌گرم',
                    'code'        => 'میلی‌گرم',
                    'position'    => 'right',
                    'description' => 'میلی‌گرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // centigram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 0.01,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Centigram',
                    'code'        => 'cg',
                    'position'    => 'left',
                    'description' => 'The centigram is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'سانتی‌گرم',
                    'code'        => 'سانتی‌گرم',
                    'position'    => 'right',
                    'description' => 'سانتی‌گرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // decigram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 0.1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Decigram',
                    'code'        => 'dg',
                    'position'    => 'left',
                    'description' => 'The decigram is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'دسی‌گرم',
                    'code'        => 'دسی‌گرم',
                    'position'    => 'right',
                    'description' => 'دسی‌گرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // dekagram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 10,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dekagram',
                    'code'        => 'dag',
                    'position'    => 'left',
                    'description' => 'The dekagram is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'دکاگرم',
                    'code'        => 'دکاگرم',
                    'position'    => 'right',
                    'description' => 'دکاگرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // megagram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megagram',
                    'code'        => 'Mg',
                    'position'    => 'left',
                    'description' => 'The megagram is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'مگاگرم',
                    'code'        => 'مگاگرم',
                    'position'    => 'right',
                    'description' => 'مگاگرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // megatonne
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megatonne',
                    'code'        => 'Mt',
                    'position'    => 'left',
                    'description' => 'The megatonne is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'مگاتن',
                    'code'        => 'مگاتن',
                    'position'    => 'right',
                    'description' => 'مگاتن یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);

        // microgram
        UnitConverter::store([
            'type'        => UnitTypeEnum::WEIGHT(),
            'value'       => 0.000001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Microgram',
                    'code'        => 'µg',
                    'position'    => 'left',
                    'description' => 'The microgram is a unit of mass in the metric system.',
                ],
                'fa' => [
                    'name'        => 'میکروگرم',
                    'code'        => 'میکروگرم',
                    'position'    => 'right',
                    'description' => 'میکروگرم یک واحد جرم در سیستم متریک است.',
                ],
            ],
        ]);
    }
}
