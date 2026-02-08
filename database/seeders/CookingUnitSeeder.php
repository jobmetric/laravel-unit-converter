<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class CookingUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Teaspoon (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Teaspoon',
                    'code'        => 'tsp',
                    'position'    => 'left',
                    'description' => 'A teaspoon is a small unit of volume used in cooking.',
                ],
                'fa' => [
                    'name'        => 'قاشق چای‌خوری',
                    'code'        => 'ق.چ',
                    'position'    => 'right',
                    'description' => 'قاشق چای‌خوری یک واحد کوچک حجم است که در آشپزی استفاده می‌شود.',
                ],
            ],
        ]);

        // Tablespoon
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 3,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Tablespoon',
                    'code'        => 'tbsp',
                    'position'    => 'left',
                    'description' => 'A tablespoon equals 3 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'قاشق غذاخوری',
                    'code'        => 'ق.غ',
                    'position'    => 'right',
                    'description' => 'قاشق غذاخوری برابر با ۳ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Cup (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 48,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Cup (US)',
                    'code'        => 'cup',
                    'position'    => 'left',
                    'description' => 'A US cup equals 48 teaspoons or 16 tablespoons.',
                ],
                'fa' => [
                    'name'        => 'فنجان (آمریکایی)',
                    'code'        => 'فنجان',
                    'position'    => 'right',
                    'description' => 'فنجان آمریکایی برابر با ۴۸ قاشق چای‌خوری یا ۱۶ قاشق غذاخوری است.',
                ],
            ],
        ]);

        // Fluid Ounce (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 6,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Fluid Ounce (US)',
                    'code'        => 'fl oz',
                    'position'    => 'left',
                    'description' => 'A US fluid ounce equals 6 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'اونس مایع (آمریکایی)',
                    'code'        => 'اونس',
                    'position'    => 'right',
                    'description' => 'اونس مایع آمریکایی برابر با ۶ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Pint (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 96,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pint (US)',
                    'code'        => 'pt',
                    'position'    => 'left',
                    'description' => 'A US pint equals 2 cups or 96 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'پاینت (آمریکایی)',
                    'code'        => 'پاینت',
                    'position'    => 'right',
                    'description' => 'پاینت آمریکایی برابر با ۲ فنجان یا ۹۶ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Quart (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 192,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Quart (US)',
                    'code'        => 'qt',
                    'position'    => 'left',
                    'description' => 'A US quart equals 4 cups or 192 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'کوارت (آمریکایی)',
                    'code'        => 'کوارت',
                    'position'    => 'right',
                    'description' => 'کوارت آمریکایی برابر با ۴ فنجان یا ۱۹۲ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Gallon (US)
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 768,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gallon (US)',
                    'code'        => 'gal',
                    'position'    => 'left',
                    'description' => 'A US gallon equals 16 cups or 768 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'گالن (آمریکایی)',
                    'code'        => 'گالن',
                    'position'    => 'right',
                    'description' => 'گالن آمریکایی برابر با ۱۶ فنجان یا ۷۶۸ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Milliliter
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 0.202884,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Milliliter',
                    'code'        => 'mL',
                    'position'    => 'left',
                    'description' => 'A milliliter is approximately 0.2 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'میلی‌لیتر',
                    'code'        => 'میلی‌لیتر',
                    'position'    => 'right',
                    'description' => 'میلی‌لیتر تقریباً ۰.۲ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Liter
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 202.884,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Liter',
                    'code'        => 'L',
                    'position'    => 'left',
                    'description' => 'A liter is approximately 203 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'لیتر',
                    'code'        => 'لیتر',
                    'position'    => 'right',
                    'description' => 'لیتر تقریباً ۲۰۳ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Pinch
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 0.0625,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Pinch',
                    'code'        => 'pinch',
                    'position'    => 'left',
                    'description' => 'A pinch is approximately 1/16 of a teaspoon.',
                ],
                'fa' => [
                    'name'        => 'نوک انگشت',
                    'code'        => 'نوک انگشت',
                    'position'    => 'right',
                    'description' => 'نوک انگشت تقریباً ۱/۱۶ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Dash
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 0.125,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Dash',
                    'code'        => 'dash',
                    'position'    => 'left',
                    'description' => 'A dash is approximately 1/8 of a teaspoon.',
                ],
                'fa' => [
                    'name'        => 'یک ذره',
                    'code'        => 'ذره',
                    'position'    => 'right',
                    'description' => 'یک ذره تقریباً ۱/۸ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Drop
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 0.0166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Drop',
                    'code'        => 'drop',
                    'position'    => 'left',
                    'description' => 'A drop is approximately 1/60 of a teaspoon.',
                ],
                'fa' => [
                    'name'        => 'قطره',
                    'code'        => 'قطره',
                    'position'    => 'right',
                    'description' => 'یک قطره تقریباً ۱/۶۰ قاشق چای‌خوری است.',
                ],
            ],
        ]);

        // Stick of Butter
        UnitConverter::store([
            'type'        => UnitTypeEnum::COOKING(),
            'value'       => 24,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Stick of Butter',
                    'code'        => 'stick',
                    'position'    => 'left',
                    'description' => 'A stick of butter equals 8 tablespoons or 24 teaspoons.',
                ],
                'fa' => [
                    'name'        => 'بسته کره',
                    'code'        => 'بسته کره',
                    'position'    => 'right',
                    'description' => 'یک بسته کره برابر با ۸ قاشق غذاخوری یا ۲۴ قاشق چای‌خوری است.',
                ],
            ],
        ]);
    }
}

