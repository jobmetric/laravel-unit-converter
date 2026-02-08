<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use JobMetric\PackageCore\Commands\ConsoleTools;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Models\Unit;

class UnitListCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:list
        {--type= : Filter units by type (e.g., weight, length, volume)}';

    protected $description = 'List all available units';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $type = $this->option('type');

        if ($type && ! $this->isValidType($type)) {
            $this->message("Invalid unit type: {$type}. Available types: " . implode(', ', UnitTypeEnum::values()), 'error');

            return self::FAILURE;
        }

        $units = $this->getUnits($type);

        if ($units->isEmpty()) {
            $this->message('No units found.', 'warning');

            return self::SUCCESS;
        }

        $this->displayUnits($units);

        return self::SUCCESS;
    }

    /**
     * Check if the given type is valid.
     */
    private function isValidType(string $type): bool
    {
        return in_array($type, UnitTypeEnum::values());
    }

    /**
     * Get units from database with optional type filter.
     */
    private function getUnits(?string $type): Collection
    {
        $query = Unit::query()->with('translations');

        if ($type) {
            $query->where('type', $type);
        }

        return $query->orderBy('type')->orderBy('value')->get();
    }

    /**
     * Display the units in a formatted output.
     */
    private function displayUnits(Collection $units): void
    {
        $this->newLine();
        $this->line('  <fg=cyan;options=bold>Available Units:</>');
        $this->newLine();

        $locale = app()->getLocale();
        $currentType = null;

        foreach ($units as $unit) {
            $currentType = $this->displayTypeHeader($unit->type, $currentType);
            $this->displayUnitRow($unit, $locale);
        }

        $this->newLine();
    }

    /**
     * Display type header if type has changed.
     */
    private function displayTypeHeader(string $type, ?string $currentType): string
    {
        if ($currentType !== $type) {
            if ($currentType !== null) {
                $this->newLine();
            }
            $this->line('  <fg=magenta;options=bold>' . Str::title($type) . ':</>');
        }

        return $type;
    }

    /**
     * Display a single unit row.
     */
    private function displayUnitRow(Unit $unit, string $locale): void
    {
        $translation = $unit->translations->firstWhere('locale', $locale);
        $name = $translation?->name ?? 'N/A';
        $code = $translation?->code ?? 'N/A';
        $status = $unit->status ? '<fg=green>✓</>' : '<fg=red>✗</>';

        $this->line("    {$status} <fg=yellow>{$code}</> - <fg=white>{$name}</> (value: <fg=cyan>{$unit->value}</>)");
    }
}

