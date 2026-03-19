<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\UnitNotFoundException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitNotFoundException.
 */
class UnitNotFoundExceptionTest extends TestCase
{
    /**
     * Verify constructor interpolates unit number and uses default not found code.
     *
     * @return void
     */
    public function test_constructor_sets_message_with_unit_number_and_default_code(): void
    {
        $exception = new UnitNotFoundException(99);

        $this->assertSame(404, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.unit_not_found', ['number' => 99]), $exception->getMessage());
    }
}

