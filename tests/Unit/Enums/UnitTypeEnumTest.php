<?php

namespace JobMetric\UnitConverter\Tests\Unit\Enums;

use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitTypeEnum helpers.
 */
class UnitTypeEnumTest extends TestCase
{
    /**
     * Verify enum values expose expected canonical unit type keys.
     *
     * @return void
     */
    public function test_values_contains_common_types(): void
    {
        $values = UnitTypeEnum::values();

        $this->assertContains('weight', $values);
        $this->assertContains('length', $values);
        $this->assertContains('volume', $values);
        $this->assertContains('time', $values);
    }

    /**
     * Verify label returns a translated string for the enum case.
     *
     * @return void
     */
    public function test_label_returns_translated_text(): void
    {
        $this->assertSame('Weight', UnitTypeEnum::WEIGHT->label());
    }
}

