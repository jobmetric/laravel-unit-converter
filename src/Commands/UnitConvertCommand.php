<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use JobMetric\PackageCore\Commands\ConsoleTools;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Facades\UnitConverter;
use JobMetric\UnitConverter\Models\Unit;
use Throwable;

class UnitConvertCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:convert
        {value : The value to convert}
        {from : The source unit code (e.g., kg, g, m, cm)}
        {to : The target unit code (e.g., kg, g, m, cm)}';

    protected $description = 'Convert a value from one unit to another';

    public function handle(): int
    {
        try {
            $value = (float) $this->argument('value');
            $fromCode = $this->argument('from');
            $toCode = $this->argument('to');

            $fromUnit = Unit::query()
                ->whereHas('translations', function ($query) use ($fromCode) {
                    $query->where('code', $fromCode);
                })
                ->first();

            if (!$fromUnit) {
                $this->message("Unit with code '{$fromCode}' not found.", 'error');
                return self::FAILURE;
            }

            $toUnit = Unit::query()
                ->whereHas('translations', function ($query) use ($toCode) {
                    $query->where('code', $toCode);
                })
                ->first();

            if (!$toUnit) {
                $this->message("Unit with code '{$toCode}' not found.", 'error');
                return self::FAILURE;
            }

            if ($fromUnit->type !== $toUnit->type) {
                $this->message("Cannot convert between different unit types. From: {$fromUnit->type}, To: {$toUnit->type}", 'error');
                return self::FAILURE;
            }

            $convertedValue = UnitConverter::convert($fromUnit->id, $toUnit->id, $value);

            $fromUnit->load('translations');
            $toUnit->load('translations');

            $fromName = $fromUnit->translations->where('locale', app()->getLocale())->first()?->name ?? $fromCode;
            $toName = $toUnit->translations->where('locale', app()->getLocale())->first()?->name ?? $toCode;

            $this->newLine();
            $this->line("  <fg=cyan>{$value}</> <fg=yellow>{$fromName}</> = <fg=green>{$convertedValue}</> <fg=yellow>{$toName}</>");
            $this->newLine();

            return self::SUCCESS;
        } catch (Throwable $e) {
            $this->message("Error: {$e->getMessage()}", 'error');
            return self::FAILURE;
        }
    }
}

