<?php

namespace JobMetric\UnitConverter\Events;

use JobMetric\UnitConverter\Models\Unit;

class UnitUpdateEvent
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly Unit  $unit,
        public readonly array $data
    )
    {
    }
}
