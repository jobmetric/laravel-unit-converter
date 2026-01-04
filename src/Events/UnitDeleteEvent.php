<?php

namespace JobMetric\UnitConverter\Events;

use JobMetric\EventSystem\Contracts\DomainEvent;
use JobMetric\EventSystem\Support\DomainEventDefinition;
use JobMetric\UnitConverter\Models\Unit;

readonly class UnitDeleteEvent implements DomainEvent
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public Unit $unit
    ) {
    }

    /**
     * Returns the stable technical key for the domain event.
     *
     * @return string
     */
    public static function key(): string
    {
        return 'unit.deleted';
    }

    /**
     * Returns the full metadata definition for this domain event.
     *
     * @return DomainEventDefinition
     */
    public static function definition(): DomainEventDefinition
    {
        return new DomainEventDefinition(self::key(), 'unit::base.events.unit_deleted.group', 'unit::base.events.unit_deleted.title', 'unit::base.events.unit_deleted.description', 'fas fa-trash-alt', [
            'unit',
            'storage',
            'management',
        ]);
    }
}
