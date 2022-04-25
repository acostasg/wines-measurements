<?php

namespace IsEazy\WinesMesasurements\Domain\TypeSensor\Service\Find;

use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use IsEazy\WinesMesasurements\Domain\Sensor\Repository\SensorRepository;

class SensorByNameFinder
{
    private SensorRepository $sensorRepository;

    public function __construct(
        SensorRepository $sensorRepository
    )
    {
        $this->sensorRepository = $sensorRepository;
    }

    public function __invoke(string $name): ?Sensor
    {
        return $this->sensorRepository->findByName($name);
    }

}