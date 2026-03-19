<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\UnitTypeDefaultValueException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitTypeDefaultValueException.
 */
class UnitTypeDefaultValueExceptionTest extends TestCase
{
    /**
     * Verify constructor interpolates unit type in translated message.
     *
     * @return void
     */
    public function test_constructor_sets_message_with_type(): void
    {
        $exception = new UnitTypeDefaultValueException('length');

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.unit_type_default_value', ['type' => 'length']), $exception->getMessage());
    }
}

