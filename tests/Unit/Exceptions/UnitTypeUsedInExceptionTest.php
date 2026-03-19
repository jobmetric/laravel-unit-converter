<?php

namespace JobMetric\UnitConverter\Tests\Unit\Exceptions;

use JobMetric\UnitConverter\Exceptions\UnitTypeUsedInException;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitTypeUsedInException.
 */
class UnitTypeUsedInExceptionTest extends TestCase
{
    /**
     * Verify constructor interpolates unit identifier and usage count.
     *
     * @return void
     */
    public function test_constructor_sets_message_with_context_values(): void
    {
        $exception = new UnitTypeUsedInException(7, 3);

        $this->assertSame(400, $exception->getCode());
        $this->assertSame(trans('unit-converter::base.exceptions.unit_type_used_in', [
                'unit_id' => 7,
                'number'  => 3,
            ]), $exception->getMessage());
    }
}

