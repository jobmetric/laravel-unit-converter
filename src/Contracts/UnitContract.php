<?php

namespace JobMetric\UnitConverter\Contracts;

interface UnitContract
{
    /**
     * unit allows the type.
     *
     * @return array
     */
    public function unitAllowTypes(): array;
}
