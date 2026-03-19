<?php

namespace JobMetric\UnitConverter\Tests\Unit\Events;

use JobMetric\EventSystem\Support\DomainEventDefinition;
use JobMetric\UnitConverter\Events\UnitStoreEvent;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitStoreEvent domain contract.
 */
class UnitStoreEventTest extends TestCase
{
    /**
     * Verify key returns stable event identifier.
     *
     * @return void
     */
    public function test_key_returns_expected_value(): void
    {
        $this->assertSame('unit.stored', UnitStoreEvent::key());
    }

    /**
     * Verify definition returns event metadata object.
     *
     * @return void
     */
    public function test_definition_returns_domain_event_definition(): void
    {
        $definition = UnitStoreEvent::definition();

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
            'type'   => 'weight',
            'value'  => 1.0,
            'status' => true,
        ]);
        $data = ['type' => 'weight', 'value' => 1.0];

        $event = new UnitStoreEvent($unit, $data);

        $this->assertSame($unit, $event->unit);
        $this->assertSame($data, $event->data);
    }
}

