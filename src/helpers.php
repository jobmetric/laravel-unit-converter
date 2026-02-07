<?php

use JobMetric\UnitConverter\Facades\UnitConverter;

if (!function_exists('unitConvert')) {
    /**
     * Convert a value between units.
     *
     * @param int $from_unit_id
     * @param int $to_unit_id
     * @param float $value
     *
     * @return float
     * @throws Throwable
     */
    function unitConvert(int $from_unit_id, int $to_unit_id, float $value): float
    {
        return UnitConverter::convert($from_unit_id, $to_unit_id, $value);
    }
}
