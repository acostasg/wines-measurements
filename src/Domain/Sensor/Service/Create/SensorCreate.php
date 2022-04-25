<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Service\Create;

use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use IsEazy\WinesMesasurements\Domain\Sensor\Repository\SensorRepository;
use IsEazy\WinesMesasurements\Domain\TypeSensor\Model\TypeSensor;
use IsEazy\WinesMesasurements\Domain\User\Model\User;

class SensorCreate
{
    private SensorRepository $sensorRepository;

    public function __construct(
        SensorRepository $sensorRepository
    )
    {
        $this->sensorRepository = $sensorRepository;
    }

    public function __invoke(
        User $owner,
        string $valor,
        TypeSensor $typeSensor
    )
    {
        $sensor = Sensor::create(
            $owner,
            $valor,
            $typeSensor
        );

        $this->sensorRepository->save($sensor);

        return $sensor;
    }

}