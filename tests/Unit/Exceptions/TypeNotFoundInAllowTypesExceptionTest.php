<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\TypeNotFoundInAllowTypesException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for TypeNotFoundInAllowTypesException.
 */
class TypeNotFoundInAllowTypesExceptionTest extends TestCase
{
    /**
     * Verify constructor interpolates type into translated message.
     *
     * @return void
     */
    public function test_constructor_sets_message_with_type(): void
    {
        $exception = new TypeNotFoundInAllowTypesException('weight');

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.type_not_found_in_allow_types', ['type' => 'weight']), $exception->getMessage());
    }
}

