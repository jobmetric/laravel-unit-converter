<?php

namespace JobMetric\UnitConverter\Exceptions;

use Exception;
use Throwable;

class UnitValueZeroException extends Exception
{
    public function __construct(int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('unit::base.exceptions.unit_value_zero'), $code, $previous);
    }
}

