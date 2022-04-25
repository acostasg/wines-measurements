<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Service\Find;

use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use IsEazy\WinesMesasurements\Domain\Sensor\Repository\SensorRepository;
use IsEazy\WinesMesasurements\Domain\User\Model\User;

class FindAllSensorsByOwner
{

    public function __construct(
        SensorRepository $sensorRepository
    ) {
        $this->sensorRepository = $sensorRepository;
    }

    /**
     * @return Sensor[]
     */
    public function __invoke(
        User $ownerId
    ) : array
    {
        return $this->sensorRepository->findByOwner($ownerId);
    }
}