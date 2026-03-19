<?php

namespace JobMetric\UnitConverter\Tests\Unit\Events;

use JobMetric\EventSystem\Support\DomainEventDefinition;
use JobMetric\UnitConverter\Events\UnitUpdateEvent;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitUpdateEvent domain contract.
 */
class UnitUpdateEventTest extends TestCase
{
    /**
     * Verify key returns stable event identifier.
     *
     * @return void
     */
    public function test_key_returns_expected_value(): void
    {
        $this->assertSame('unit.updated', UnitUpdateEvent::key());
    }

    /**
     * Verify definition returns event metadata object.
     *
     * @return void
     */
    public function test_definition_returns_domain_event_definition(): void
    {
        $definition = UnitUpdateEvent::definition();

        $this->assertInstanceOf(DomainEventDefinition::class, $definition);
    }

    /**
     * Verify constructor stores payload data and related unit.
     *
     * @return void
     */
    public function test_constructor_sets_unit_and_data(): void
    {
        $unit = new Unit([
            'type'   => 'length',
            'value'  => 1.0,
            'status' => true,
        ]);
        $data = ['value' => 100.0];

        $event = new UnitUpdateEvent($unit, $data);

        $this->assertSame($unit, $event->unit);
        $this->assertSame($data, $event->data);
    }
}

