<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Exception;

class VarietyMeasurementByNameNotFound extends \Exception
{

    public function __construct(string $name)
    {
        parent::__construct(
            sprintf(
                'VarietyMeasurement with name %s not found',
                $name
            )
        );
    }

}