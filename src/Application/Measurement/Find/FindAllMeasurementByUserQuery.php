<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Find;

use Symfony\Component\Uid\Uuid;

class FindAllMeasurementByUserQuery
{
    private string $userId;

    public function __construct(
        string $userId
    )
    {
        $this->userId = $userId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

}