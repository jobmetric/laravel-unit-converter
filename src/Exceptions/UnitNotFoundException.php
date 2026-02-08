<?php

namespace JobMetric\UnitConverter\Exceptions;

use Exception;
use Throwable;

class UnitNotFoundException extends Exception
{
    public function __construct(int $number, int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct(trans('unit-converter::base.exceptions.unit_not_found', [
            'number' => $number,
        ]), $code, $previous);
    }
}
