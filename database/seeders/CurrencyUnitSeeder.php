<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class CurrencyUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Iranian Rial (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::CURRENCY(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Iranian Rial',
                    'code'        => 'IRR',
                    'position'    => 'right',
                    'description' => 'The Iranian rial is the currency of Iran.',
                ],
                'fa' => [
                    'name'        => 'ریال ایران',
                    'code'        => 'ریال',
                    'position'    => 'right',
                    'description' => 'ریال واحد پول رسمی ایران است.',
                ],
            ],
        ]);

        // Iranian Toman
        UnitConverter::store([
            'type'        => UnitTypeEnum::CURRENCY(),
            'value'       => 10,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Iranian Toman',
                    'code'        => 'IRT',
                    'position'    => 'right',
                    'description' => 'The toman is a superunit of the Iranian rial.',
                ],
                'fa' => [
                    'name'        => 'تومان',
                    'code'        => 'تومان',
                    'position'    => 'right',
                    'description' => 'تومان واحد پول رایج در ایران است که برابر با ۱۰ ریال است.',
                ],
            ],
        ]);
    }
}

