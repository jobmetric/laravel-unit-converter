<?php

namespace JobMetric\UnitConverter\Tests\Feature\Commands;

use JobMetric\UnitConverter\Facades\UnitConverter;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Feature tests for unit:convert command behavior.
 */
class UnitConvertCommandTest extends TestCase
{
    /**
     * Seed two units with translation payload required by command lookup.
     *
     * @return void
     */
    protected function seedWeightUnits(): void
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

        UnitConverter::store([
            'type'        => 'weight',
            'value'       => 1000.0,
            'status'      => true,
            'translation' => [
                'en' => [
                    'name'        => 'Gram',
                    'code'        => 'g',
                    'position'    => 'right',
                    'description' => '',
                ],
            ],
        ]);
    }

    /**
     * Verify command succeeds when both units exist and are same type.
     *
     * @return void
     */
    public function test_command_converts_value_successfully(): void
    {
        $this->seedWeightUnits();

        $this->artisan('unit:convert', [
            'value'       => '1',
            'from'        => 'kg',
            'to'          => 'g',
            '--precision' => '4',
            '--locale'    => 'en',
        ])->assertExitCode(0);
    }

    /**
     * Verify command fails when source unit code does not exist.
     *
     * @return void
     */
    public function test_command_fails_when_source_unit_not_found(): void
    {
        $this->seedWeightUnits();

        $this->artisan('unit:convert', [
            'value' => '1',
            'from'  => 'unknown',
            'to'    => 'g',
        ])->assertExitCode(1);
    }
}

