<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\UnitTypeCannotChangeDefaultValueException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitTypeCannotChangeDefaultValueException.
 */
class UnitTypeCannotChangeDefaultValueExceptionTest extends TestCase
{
    /**
     * Verify constructor sets translated message and default code.
     *
     * @return void
     */
    public function test_constructor_sets_message_and_default_code(): void
    {
        $exception = new UnitTypeCannotChangeDefaultValueException;

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.unit_type_cannot_change_default_value'), $exception->getMessage());
    }
}

