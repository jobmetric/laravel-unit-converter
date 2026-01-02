<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use JobMetric\PackageCore\Commands\ConsoleTools;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Models\Unit;
use Illuminate\Support\Str;

class UnitListCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:list
        {--type= : Filter units by type (e.g., weight, length, volume)}';

    protected $description = 'List all available units';

    public function handle(): int
    {
        $type = $this->option('type');

        $query = Unit::query()->with('translations');

        if ($type) {
            if (!in_array($type, UnitTypeEnum::values())) {
                $this->message("Invalid unit type: {$type}. Available types: " . implode(', ', UnitTypeEnum::values()), 'error');
                return self::FAILURE;
            }
            $query->where('type', $type);
        }

        $units = $query->orderBy('type')->orderBy('value')->get();

        if ($units->isEmpty()) {
            $this->message('No units found.', 'warning');
            return self::SUCCESS;
        }

        $this->newLine();
        $this->line('  <fg=cyan;options=bold>Available Units:</>');
        $this->newLine();

        $currentType = null;
        foreach ($units as $unit) {
            if ($currentType !== $unit->type) {
                if ($currentType !== null) {
                    $this->newLine();
                }
                $currentType = $unit->type;
                $this->line('  <fg=magenta;options=bold>' . Str::title($unit->type) . ':</>');
            }

            $translation = $unit->translations->where('locale', app()->getLocale())->first();
            $name = $translation?->name ?? 'N/A';
            $code = $translation?->code ?? 'N/A';
            $status = $unit->status ? '<fg=green>✓</>' : '<fg=red>✗</>';

            $this->line("    {$status} <fg=yellow>{$code}</> - <fg=white>{$name}</> (value: <fg=cyan>{$unit->value}</>)");
        }

        $this->newLine();

        return self::SUCCESS;
    }
}

