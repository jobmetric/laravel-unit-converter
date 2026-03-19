<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\UnitValueZeroException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitValueZeroException.
 */
class UnitValueZeroExceptionTest extends TestCase
{
    /**
     * Verify constructor sets translated message and default code.
     *
     * @return void
     */
    public function test_constructor_sets_message_and_default_code(): void
    {
        $exception = new UnitValueZeroException;

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.unit_value_zero'), $exception->getMessage());
    }
}

