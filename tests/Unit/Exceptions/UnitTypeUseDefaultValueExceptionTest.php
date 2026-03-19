<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\UnitTypeUseDefaultValueException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitTypeUseDefaultValueException.
 */
class UnitTypeUseDefaultValueExceptionTest extends TestCase
{
    /**
     * Verify constructor interpolates unit type in translated message.
     *
     * @return void
     */
    public function test_constructor_sets_message_with_type(): void
    {
        $exception = new UnitTypeUseDefaultValueException('length');

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.unit_type_use_default_value', ['type' => 'length']), $exception->getMessage());
    }
}

