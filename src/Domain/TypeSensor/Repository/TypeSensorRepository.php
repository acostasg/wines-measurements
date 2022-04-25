<?php

namespace IsEazy\WinesMesasurements\Domain\TypeSensor\Repository;

use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use Symfony\Component\Uid\Uuid;

interface TypeSensorRepository
{
    /** @return Sensor[] */
    public function getAll();

    public function getById(Uuid $id): ?Sensor;

    public function getByName(string $name): ?Sensor;

}