<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use JobMetric\PackageCore\Commands\ConsoleTools;
use Throwable;

class UnitSeedCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:seed';

    protected $description = 'Seed default units into the database (interactive selection)';

    /**
     * Mapping of unit types to their seeder classes.
     *
     * @return array<string, string>
     */
    protected function getSeederMap(): array
    {
        $namespace = 'JobMetric\\UnitConverter\\Seeders\\';

        return [
            'weight'                    => $namespace . 'WeightUnitSeeder',
            'length'                    => $namespace . 'LengthUnitSeeder',
            'currency'                  => $namespace . 'CurrencyUnitSeeder',
            'number'                    => $namespace . 'NumberUnitSeeder',
            'volume'                    => $namespace . 'VolumeUnitSeeder',
            'temperature'               => $namespace . 'TemperatureUnitSeeder',
            'area'                      => $namespace . 'AreaUnitSeeder',
            'pressure'                  => $namespace . 'PressureUnitSeeder',
            'speed'                     => $namespace . 'SpeedUnitSeeder',
            'force'                     => $namespace . 'ForceUnitSeeder',
            'time'                      => $namespace . 'TimeUnitSeeder',
            'torque'                    => $namespace . 'TorqueUnitSeeder',
            'energy'                    => $namespace . 'EnergyUnitSeeder',
            'frequency'                 => $namespace . 'FrequencyUnitSeeder',
            'power'                     => $namespace . 'PowerUnitSeeder',
            'acceleration'              => $namespace . 'AccelerationUnitSeeder',
            'data_transfer'             => $namespace . 'DataTransferUnitSeeder',
            'data_storage'              => $namespace . 'DataStorageUnitSeeder',
            'angle'                     => $namespace . 'AngleUnitSeeder',
            'density'                   => $namespace . 'DensityUnitSeeder',
            'mass_flow'                 => $namespace . 'MassFlowUnitSeeder',
            'volumetric_flow'           => $namespace . 'VolumetricFlowUnitSeeder',
            'electric_current'          => $namespace . 'ElectricCurrentUnitSeeder',
            'heat_transfer_coefficient' => $namespace . 'HeatTransferCoefficientUnitSeeder',
            'luminosity'                => $namespace . 'LuminosityUnitSeeder',
            'electric_voltage'          => $namespace . 'ElectricVoltageUnitSeeder',
            'electric_resistance'       => $namespace . 'ElectricResistanceUnitSeeder',
            'electric_capacitance'      => $namespace . 'ElectricCapacitanceUnitSeeder',
            'electric_inductance'       => $namespace . 'ElectricInductanceUnitSeeder',
            'magnetic_flux'             => $namespace . 'MagneticFluxUnitSeeder',
            'radiation'                 => $namespace . 'RadiationUnitSeeder',
            'fuel_consumption'          => $namespace . 'FuelConsumptionUnitSeeder',
            'viscosity'                 => $namespace . 'ViscosityUnitSeeder',
            'concentration'             => $namespace . 'ConcentrationUnitSeeder',
            'cooking'                   => $namespace . 'CookingUnitSeeder',
        ];
    }

    /**
     * Get display labels for unit types.
     *
     * @return array<string, string>
     */
    protected function getTypeLabels(): array
    {
        return [
            'weight'                    => 'Weight (وزن)',
            'length'                    => 'Length (طول)',
            'currency'                  => 'Currency (ارز)',
            'number'                    => 'Number (تعداد)',
            'volume'                    => 'Volume (حجم)',
            'temperature'               => 'Temperature (دما)',
            'area'                      => 'Area (مساحت)',
            'pressure'                  => 'Pressure (فشار)',
            'speed'                     => 'Speed (سرعت)',
            'force'                     => 'Force (نیرو)',
            'time'                      => 'Time (زمان)',
            'torque'                    => 'Torque (گشتاور)',
            'energy'                    => 'Energy (انرژی)',
            'frequency'                 => 'Frequency (بسامد)',
            'power'                     => 'Power (توان)',
            'acceleration'              => 'Acceleration (شتاب)',
            'data_transfer'             => 'Data Transfer (انتقال داده)',
            'data_storage'              => 'Data Storage (ذخیره‌سازی داده)',
            'angle'                     => 'Angle (زاویه)',
            'density'                   => 'Density (چگالی)',
            'mass_flow'                 => 'Mass Flow (جریان جرمی)',
            'volumetric_flow'           => 'Volumetric Flow (جریان حجمی)',
            'electric_current'          => 'Electric Current (جریان الکتریکی)',
            'heat_transfer_coefficient' => 'Heat Transfer Coefficient (ضریب انتقال حرارت)',
            'luminosity'                => 'Luminosity (روشنایی)',
            'electric_voltage'          => 'Electric Voltage (ولتاژ)',
            'electric_resistance'       => 'Electric Resistance (مقاومت)',
            'electric_capacitance'      => 'Electric Capacitance (خازن)',
            'electric_inductance'       => 'Electric Inductance (اندوکتانس)',
            'magnetic_flux'             => 'Magnetic Flux (شار مغناطیسی)',
            'radiation'                 => 'Radiation (تابش)',
            'fuel_consumption'          => 'Fuel Consumption (مصرف سوخت)',
            'viscosity'                 => 'Viscosity (ویسکوزیته)',
            'concentration'             => 'Concentration (غلظت)',
            'cooking'                   => 'Cooking (آشپزی)',
        ];
    }

    public function handle(): int
    {
        $seederMap = $this->getSeederMap();
        $typeLabels = $this->getTypeLabels();

        $this->newLine();
        $this->line('  <fg=cyan;options=bold>Unit Seeder - Interactive Mode</>');
        $this->newLine();

        // Build options list with "All" at the top
        $options = ['all' => '✅ All Unit Types'];
        foreach ($seederMap as $type => $class) {
            $options[$type] = $typeLabels[$type] ?? ucfirst($type);
        }

        // Use Laravel's choice with multiple selection
        $selected = $this->choice('Which unit types would you like to seed? (Use comma to select multiple, e.g., 0,1,2)', array_values($options), 0, null, true);

        // Map back from labels to keys
        $optionFlipped = array_flip($options);
        $selectedTypes = [];

        foreach ($selected as $label) {
            if (isset($optionFlipped[$label])) {
                $selectedTypes[] = $optionFlipped[$label];
            }
        }

        // If "all" is selected, seed everything
        if (in_array('all', $selectedTypes)) {
            $selectedTypes = array_keys($seederMap);
        }

        if (empty($selectedTypes)) {
            $this->message('No unit types selected. Exiting.', 'warning');

            return self::SUCCESS;
        }

        $this->newLine();
        $this->line('  <fg=yellow>Selected types:</>');
        foreach ($selectedTypes as $type) {
            $this->line("    • {$type}");
        }
        $this->newLine();

        if (! $this->confirm('Do you want to proceed with seeding these unit types?', true)) {
            $this->message('Operation cancelled.', 'warning');

            return self::SUCCESS;
        }

        $this->newLine();
        $this->line('  <fg=cyan;options=bold>Seeding Units...</>');
        $this->newLine();

        $successCount = 0;
        $failCount = 0;

        foreach ($selectedTypes as $type) {
            if (! isset($seederMap[$type])) {
                continue;
            }

            $seederClass = $seederMap[$type];
            $seederName = class_basename($seederClass);
            $this->line("  Seeding <fg=yellow>{$seederName}</>...");

            try {
                $seeder = new $seederClass();
                $seeder->run();
                $this->line("  <fg=green>✓</> {$seederName} seeded successfully");
                $successCount++;
            } catch (Throwable $e) {
                $this->line("  <fg=red>✗</> Error seeding {$seederName}: {$e->getMessage()}");
                $failCount++;
            }
        }

        $this->newLine();

        if ($failCount === 0) {
            $this->message("All {$successCount} unit seeders completed successfully!", 'success');

            return self::SUCCESS;
        }

        if ($successCount > 0) {
            $this->message("{$successCount} seeders succeeded, {$failCount} failed.", 'warning');
        }
        else {
            $this->message("All {$failCount} seeders failed.", 'error');
        }

        return $failCount > 0 ? self::FAILURE : self::SUCCESS;
    }
}
