<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Exception;

class TypeMeasurementByNameNotFound extends \Exception
{

    public function __construct(string $name)
    {
        parent::__construct(
            sprintf(
                'TypeMeasurement with name %s not found',
                $name
            )
        );
    }

}