<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\CannotDeleteDefaultValueException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for CannotDeleteDefaultValueException.
 */
class CannotDeleteDefaultValueExceptionTest extends TestCase
{
    /**
     * Verify constructor sets translated message and default code.
     *
     * @return void
     */
    public function test_constructor_sets_message_and_default_code(): void
    {
        $exception = new CannotDeleteDefaultValueException;

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.cannot_delete_default_value'), $exception->getMessage());
    }
}

