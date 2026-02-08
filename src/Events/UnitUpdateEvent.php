<?php

namespace JobMetric\UnitConverter\Events;

use JobMetric\EventSystem\Contracts\DomainEvent;
use JobMetric\EventSystem\Support\DomainEventDefinition;
use JobMetric\UnitConverter\Models\Unit;

readonly class UnitUpdateEvent implements DomainEvent
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public Unit $unit,
        public array $data
    ) {
    }

    /**
     * Returns the stable technical key for the domain event.
     *
     * @return string
     */
    public static function key(): string
    {
        return 'unit.updated';
    }

    /**
     * Returns the full metadata definition for this domain event.
     *
     * @return DomainEventDefinition
     */
    public static function definition(): DomainEventDefinition
    {
        return new DomainEventDefinition(self::key(), 'unit-converter::base.entity_names.unit', 'unit-converter::base.events.unit_updated.title', 'unit-converter::base.events.unit_updated.description', 'fas fa-edit', [
            'unit',
            'storage',
            'management',
        ]);
    }
}
