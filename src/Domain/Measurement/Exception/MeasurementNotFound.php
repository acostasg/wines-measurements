<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Exception;

use Symfony\Component\Uid\Uuid;

class MeasurementNotFound extends \Exception {

    public function __construct(Uuid $id )
    {
        parent::__construct(
            sprintf(
                'Measurement with id %s not found',
                $id->jsonSerialize()
            )
        );
    }

}