<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\FromAndToMustSameTypeException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for FromAndToMustSameTypeException.
 */
class FromAndToMustSameTypeExceptionTest extends TestCase
{
    /**
     * Verify constructor sets translated message and default code.
     *
     * @return void
     */
    public function test_constructor_sets_message_and_default_code(): void
    {
        $exception = new FromAndToMustSameTypeException;

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.from_and_to_must_same_type'), $exception->getMessage());
    }
}

