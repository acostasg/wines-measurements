<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Find;

use Symfony\Component\Uid\Uuid;

class FindAllMeasurementByUserQuery
{
    private Uuid $userId;

    public function __construct(
        Uuid $userId
    )
    {
        $this->userId = $userId;
    }

    public function getUserId(): Uuid
    {
        return $this->userId;
    }

}