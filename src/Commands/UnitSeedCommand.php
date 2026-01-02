<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use JobMetric\PackageCore\Commands\ConsoleTools;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Seeders\LengthUnitSeeder;
use JobMetric\UnitConverter\Seeders\TemperatureUnitSeeder;
use JobMetric\UnitConverter\Seeders\VolumeUnitSeeder;
use JobMetric\UnitConverter\Seeders\WeightUnitSeeder;

class UnitSeedCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:seed
        {--type=all : The type of units to seed (weight, length, volume, temperature, or all)}';

    protected $description = 'Seed default units into the database';

    public function handle(): int
    {
        $type = $this->option('type');

        $validTypes = ['weight', 'length', 'volume', 'temperature', 'all'];

        if (!in_array($type, $validTypes)) {
            $this->message("Invalid type: {$type}. Valid types: " . implode(', ', $validTypes), 'error');
            return self::FAILURE;
        }

        $this->newLine();
        $this->line('  <fg=cyan;options=bold>Seeding Units...</>');
        $this->newLine();

        $seeders = [];

        if ($type === 'all' || $type === 'weight') {
            $seeders[] = WeightUnitSeeder::class;
        }

        if ($type === 'all' || $type === 'length') {
            $seeders[] = LengthUnitSeeder::class;
        }

        if ($type === 'all' || $type === 'volume') {
            $seeders[] = VolumeUnitSeeder::class;
        }

        if ($type === 'all' || $type === 'temperature') {
            $seeders[] = TemperatureUnitSeeder::class;
        }

        foreach ($seeders as $seederClass) {
            $seederName = class_basename($seederClass);
            $this->line("  Seeding <fg=yellow>{$seederName}</>...");

            try {
                $seeder = new $seederClass();
                $seeder->run();
                $this->line("  <fg=green>✓</> {$seederName} seeded successfully");
            } catch (\Throwable $e) {
                $this->line("  <fg=red>✗</> Error seeding {$seederName}: {$e->getMessage()}");
                return self::FAILURE;
            }
        }

        $this->newLine();
        $this->message('Units seeded successfully!', 'success');

        return self::SUCCESS;
    }
}

