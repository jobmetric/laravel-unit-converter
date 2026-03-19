<?php

namespace JobMetric\UnitConverter\Tests\Feature\Commands;

use JobMetric\UnitConverter\Facades\UnitConverter;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Feature tests for unit:export command behavior.
 */
class UnitExportCommandTest extends TestCase
{
    /**
     * Seed one unit with translation payload.
     *
     * @return void
     */
    protected function seedWeightUnit(): void
    {
        UnitConverter::store([
            'type'        => 'weight',
            'value'       => 1.0,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram',
                    'code'        => 'kg',
                    'position'    => 'right',
                    'description' => '',
                ],
            ],
        ]);
    }

    /**
     * Verify command exports JSON to provided output path.
     *
     * @return void
     */
    public function test_command_exports_json_file(): void
    {
        $this->seedWeightUnit();

        $outputPath = storage_path('app/unit_export_test.json');

        if (file_exists($outputPath)) {
            unlink($outputPath);
        }

        $this->artisan('unit:export', [
            '--type'   => 'weight',
            '--format' => 'json',
            '--output' => $outputPath,
        ])->assertExitCode(0);

        $this->assertFileExists($outputPath);
        $content = file_get_contents($outputPath);
        $this->assertNotFalse($content);
        $this->assertStringContainsString('"type": "weight"', (string) $content);

        unlink($outputPath);
    }

    /**
     * Verify command fails for unsupported export format.
     *
     * @return void
     */
    public function test_command_fails_for_invalid_format(): void
    {
        $this->seedWeightUnit();

        $this->artisan('unit:export', [
            '--format' => 'xml',
        ])->assertExitCode(1);
    }
}

