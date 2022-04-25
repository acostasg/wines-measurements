<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Repository;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\TypeMeasurement;
use Symfony\Component\Uid\Uuid;

interface TypeMeasurementRepository
{
    /**
     * @return TypeMeasurement[]
     */
    public function findAll(): array;

    public function findByName(string $name): ?TypeMeasurement;

    public function findById(Uuid $id): ?TypeMeasurement;

}