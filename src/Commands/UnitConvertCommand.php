<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use JobMetric\PackageCore\Commands\ConsoleTools;
use JobMetric\UnitConverter\Facades\UnitConverter;
use Throwable;

class UnitConvertCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:convert
        {value : The value to convert}
        {from : The source unit code (e.g., kg, g, m, cm)}
        {to : The target unit code (e.g., kg, g, m, cm)}
        {--p|precision=4 : Number of decimal places}
        {--l|locale= : The locale for unit names}';

    protected $description = 'Convert a value from one unit to another';

    public function handle(): int
    {
        try {
            $value = (float) $this->argument('value');
            $fromCode = $this->argument('from');
            $toCode = $this->argument('to');
            $precision = (int) $this->option('precision');
            $locale = $this->option('locale') ?? app()->getLocale();

            // Find units by code using UnitConverter facade
            $fromUnit = UnitConverter::findUnitByCode($fromCode);
            if (! $fromUnit) {
                $this->message("Unit with code '{$fromCode}' not found.", 'error');

                return self::FAILURE;
            }

            $toUnit = UnitConverter::findUnitByCode($toCode);
            if (! $toUnit) {
                $this->message("Unit with code '{$toCode}' not found.", 'error');

                return self::FAILURE;
            }

            // Ensure both units are of the same type
            if ($fromUnit->type !== $toUnit->type) {
                $this->message("Cannot convert between different unit types. From: {$fromUnit->type}, To: {$toUnit->type}", 'error');

                return self::FAILURE;
            }

            // Perform conversion with rounding
            $convertedValue = round(UnitConverter::convert($fromUnit->id, $toUnit->id, $value), $precision);

            // Display result
            $this->displayResult($value, $convertedValue, $fromUnit, $toUnit, $locale);

            return self::SUCCESS;
        } catch (Throwable $e) {
            $this->message("Error: {$e->getMessage()}", 'error');

            return self::FAILURE;
        }
    }

    /**
     * Display the conversion result in a formatted manner.
     *
     * @param float $value
     * @param float $convertedValue
     * @param object $fromUnit
     * @param object $toUnit
     * @param string $locale
     *
     * @return void
     */
    private function displayResult(
        float $value,
        float $convertedValue,
        object $fromUnit,
        object $toUnit,
        string $locale
    ): void {
        // Load translations
        $fromUnit->load('translations');
        $toUnit->load('translations');

        // Get localized unit names or fallback to code
        $fromName = $fromUnit->translations->where('locale', $locale)
            ->first()?->name ?? $fromUnit->translations->first()?->code ?? 'unknown';

        $toName = $toUnit->translations->where('locale', $locale)
            ->first()?->name ?? $toUnit->translations->first()?->code ?? 'unknown';

        $this->newLine();
        $this->line("  <fg=cyan>{$value}</> <fg=yellow>{$fromName}</> = <fg=green>{$convertedValue}</> <fg=yellow>{$toName}</>");
        $this->newLine();
    }
}
