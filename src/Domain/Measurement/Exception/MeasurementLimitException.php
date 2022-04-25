<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Exception;

class MeasurementLimitException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Measurement limit reached');
    }
}