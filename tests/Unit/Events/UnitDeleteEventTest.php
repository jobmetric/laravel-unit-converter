<?php

namespace JobMetric\UnitConverter\Tests\Unit\Events;

use JobMetric\EventSystem\Support\DomainEventDefinition;
use JobMetric\UnitConverter\Events\UnitDeleteEvent;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitDeleteEvent domain contract.
 */
class UnitDeleteEventTest extends TestCase
{
    /**
     * Verify key returns stable event identifier.
     *
     * @return void
     */
    public function test_key_returns_expected_value(): void
    {
        $this->assertSame('unit.deleted', UnitDeleteEvent::key());
    }

    /**
     * Verify definition returns event metadata object.
     *
     * @return void
     */
    public function test_definition_returns_domain_event_definition(): void
    {
        $definition = UnitDeleteEvent::definition();

        $this->assertInstanceOf(DomainEventDefinition::class, $definition);
    }

    /**
     * Verify constructor stores unit payload.
     *
     * @return void
     */
    public function test_constructor_sets_unit(): void
    {
        $unit = new Unit([
            'type'   => 'volume',
            'value'  => 1.0,
            'status' => true,
        ]);

        $event = new UnitDeleteEvent($unit);

        $this->assertSame($unit, $event->unit);
    }
}

