<?php

namespace JobMetric\UnitConverter\Tests\Unit;

use JobMetric\UnitConverter\Facades\UnitConverter as UnitConverterFacade;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for helper functions.
 */
class HelpersTest extends TestCase
{
    /**
     * Verify unitConvert delegates conversion to the facade and returns its value.
     *
     * @return void
     */
    public function test_unit_convert_helper_delegates_to_facade(): void
    {
        UnitConverterFacade::shouldReceive('convert')->once()->with(1, 2, 10.5)->andReturn(42.25);

        $result = unitConvert(1, 2, 10.5);

        $this->assertSame(42.25, $result);
    }
}

