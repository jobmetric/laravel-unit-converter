<?php

namespace JobMetric\UnitConverter\Commands;

use Illuminate\Console\Command;
use JobMetric\PackageCore\Commands\ConsoleTools;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Models\Unit;
use Illuminate\Support\Facades\File;

class UnitExportCommand extends Command
{
    use ConsoleTools;

    protected $signature = 'unit:export
        {--type= : Filter units by type (e.g., weight, length, volume)}
        {--format=json : Export format (json or csv)}
        {--output= : Output file path (optional)}';

    protected $description = 'Export units to JSON or CSV file';

    public function handle(): int
    {
        $type = $this->option('type');
        $format = $this->option('format') ?? 'json';
        $output = $this->option('output');

        if (!in_array($format, ['json', 'csv'])) {
            $this->message("Invalid format: {$format}. Valid formats: json, csv", 'error');
            return self::FAILURE;
        }

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
            $this->message('No units found to export.', 'warning');
            return self::SUCCESS;
        }

        $data = $units->map(function ($unit) {
            $translations = $unit->translations->mapWithKeys(function ($translation) {
                return [
                    $translation->locale => [
                        'name' => $translation->name,
                        'code' => $translation->code,
                        'position' => $translation->position,
                        'description' => $translation->description,
                    ]
                ];
            });

            return [
                'id' => $unit->id,
                'type' => $unit->type,
                'value' => (float) $unit->value,
                'status' => $unit->status,
                'translations' => $translations,
                'created_at' => $unit->created_at?->toIso8601String(),
                'updated_at' => $unit->updated_at?->toIso8601String(),
            ];
        })->values();

        if ($format === 'json') {
            $content = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $extension = 'json';
        } else {
            $content = $this->convertToCsv($data);
            $extension = 'csv';
        }

        if ($output) {
            $filePath = $output;
        } else {
            $fileName = 'units' . ($type ? '_' . $type : '') . '_' . date('Y-m-d_His') . '.' . $extension;
            $filePath = storage_path('app/' . $fileName);
        }

        File::put($filePath, $content);

        $this->newLine();
        $this->message("Units exported successfully to: {$filePath}", 'success');
        $this->line("  Total units exported: <fg=cyan>" . $units->count() . "</>");

        return self::SUCCESS;
    }

    protected function convertToCsv(array $data): string
    {
        if (empty($data)) {
            return '';
        }

        $headers = ['ID', 'Type', 'Value', 'Status', 'Name (en)', 'Code (en)', 'Name (fa)', 'Code (fa)', 'Created At', 'Updated At'];
        $rows = [];

        foreach ($data as $unit) {
            $enTranslation = $unit['translations']['en'] ?? [];
            $faTranslation = $unit['translations']['fa'] ?? [];

            $rows[] = [
                $unit['id'],
                $unit['type'],
                $unit['value'],
                $unit['status'] ? '1' : '0',
                $enTranslation['name'] ?? '',
                $enTranslation['code'] ?? '',
                $faTranslation['name'] ?? '',
                $faTranslation['code'] ?? '',
                $unit['created_at'] ?? '',
                $unit['updated_at'] ?? '',
            ];
        }

        $output = fopen('php://temp', 'r+');
        fputcsv($output, $headers);

        foreach ($rows as $row) {
            fputcsv($output, $row);
        }

        rewind($output);
        $content = stream_get_contents($output);
        fclose($output);

        return $content;
    }
}

