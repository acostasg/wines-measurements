<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Exception;

use Symfony\Component\Uid\Uuid;

class SensorNotFound extends \Exception
{
    public function __construct(Uuid $id )
    {
        parent::__construct(
            sprintf(
                'Sensor with id %s not found',
                $id->jsonSerialize()
            )
        );
    }
}