<?php

namespace JobMetric\UnitConverter\Seeders;

use Illuminate\Database\Seeder;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;

class FrequencyUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hertz (base unit)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 1,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Hertz',
                    'code'        => 'Hz',
                    'position'    => 'left',
                    'description' => 'The hertz is the SI unit of frequency.',
                ],
                'fa' => [
                    'name'        => 'هرتز',
                    'code'        => 'Hz',
                    'position'    => 'right',
                    'description' => 'هرتز واحد SI برای بسامد است.',
                ],
            ],
        ]);

        // Kilohertz
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 1000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilohertz',
                    'code'        => 'kHz',
                    'position'    => 'left',
                    'description' => 'A kilohertz is 1,000 hertz.',
                ],
                'fa' => [
                    'name'        => 'کیلوهرتز',
                    'code'        => 'kHz',
                    'position'    => 'right',
                    'description' => 'کیلوهرتز برابر با ۱۰۰۰ هرتز است.',
                ],
            ],
        ]);

        // Megahertz
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 1000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Megahertz',
                    'code'        => 'MHz',
                    'position'    => 'left',
                    'description' => 'A megahertz is 1,000,000 hertz.',
                ],
                'fa' => [
                    'name'        => 'مگاهرتز',
                    'code'        => 'MHz',
                    'position'    => 'right',
                    'description' => 'مگاهرتز برابر با ۱،۰۰۰،۰۰۰ هرتز است.',
                ],
            ],
        ]);

        // Gigahertz
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 1000000000,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gigahertz',
                    'code'        => 'GHz',
                    'position'    => 'left',
                    'description' => 'A gigahertz is 1,000,000,000 hertz, commonly used for CPU speeds.',
                ],
                'fa' => [
                    'name'        => 'گیگاهرتز',
                    'code'        => 'GHz',
                    'position'    => 'right',
                    'description' => 'گیگاهرتز برابر با ۱،۰۰۰،۰۰۰،۰۰۰ هرتز است و معمولاً برای سرعت پردازنده استفاده می‌شود.',
                ],
            ],
        ]);


        // Millihertz
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 0.001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Millihertz',
                    'code'        => 'mHz',
                    'position'    => 'left',
                    'description' => 'A millihertz is one thousandth of a hertz.',
                ],
                'fa' => [
                    'name'        => 'میلی‌هرتز',
                    'code'        => 'mHz',
                    'position'    => 'right',
                    'description' => 'میلی‌هرتز یک هزارم هرتز است.',
                ],
            ],
        ]);

        // Revolutions per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 0.0166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Revolutions per Minute',
                    'code'        => 'RPM',
                    'position'    => 'left',
                    'description' => 'Revolutions per minute is a unit of rotational speed.',
                ],
                'fa' => [
                    'name'        => 'دور بر دقیقه',
                    'code'        => 'RPM',
                    'position'    => 'right',
                    'description' => 'دور بر دقیقه یک واحد سرعت چرخشی است.',
                ],
            ],
        ]);

        // Revolutions per Second (equal to 1 Hz)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 1.00001,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Revolutions per Second',
                    'code'        => 'RPS',
                    'position'    => 'left',
                    'description' => 'Revolutions per second is a unit of rotational speed.',
                ],
                'fa' => [
                    'name'        => 'دور بر ثانیه',
                    'code'        => 'RPS',
                    'position'    => 'right',
                    'description' => 'دور بر ثانیه یک واحد سرعت چرخشی است.',
                ],
            ],
        ]);

        // Beats per Minute
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 0.0166667,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Beats per Minute',
                    'code'        => 'BPM',
                    'position'    => 'left',
                    'description' => 'Beats per minute is a unit used in music and heart rate.',
                ],
                'fa' => [
                    'name'        => 'ضربه بر دقیقه',
                    'code'        => 'BPM',
                    'position'    => 'right',
                    'description' => 'ضربه بر دقیقه واحدی است که در موسیقی و ضربان قلب استفاده می‌شود.',
                ],
            ],
        ]);

        // Frames per Second (equal to 1 Hz)
        UnitConverter::store([
            'type'        => UnitTypeEnum::FREQUENCY(),
            'value'       => 1.00002,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Frames per Second',
                    'code'        => 'FPS',
                    'position'    => 'left',
                    'description' => 'Frames per second is a unit used in video and gaming.',
                ],
                'fa' => [
                    'name'        => 'فریم بر ثانیه',
                    'code'        => 'FPS',
                    'position'    => 'right',
                    'description' => 'فریم بر ثانیه واحدی است که در ویدیو و بازی استفاده می‌شود.',
                ],
            ],
        ]);
    }
}

