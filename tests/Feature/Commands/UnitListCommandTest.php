<?php

namespace JobMetric\UnitConverter\Tests\Feature\Commands;

use JobMetric\UnitConverter\Facades\UnitConverter;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Feature tests for unit:list command behavior.
 */
class UnitListCommandTest extends TestCase
{
    /**
     * Seed one test unit for list command scenarios.
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
     * Verify command succeeds and lists units for a valid type.
     *
     * @return void
     */
    public function test_command_lists_units_for_valid_type(): void
    {
        $this->seedWeightUnit();

        $this->artisan('unit:list', [
            '--type'   => 'weight',
            '--locale' => 'en',
        ])->assertExitCode(0);
    }

    /**
     * Verify command fails for an invalid type option.
     *
     * @return void
     */
    public function test_command_fails_for_invalid_type(): void
    {
        $this->seedWeightUnit();

        $this->artisan('unit:list', [
            '--type'   => 'invalid_type',
            '--locale' => 'en',
        ])->assertExitCode(1);
    }
}

