<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Repository;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\VarietyMeasurement;
use Symfony\Component\Uid\Uuid;

interface VarietyMeasurementRepository
{
    /**
     * @return VarietyMeasurement[]
     */
    public function findAll(): array;

    public function findByName(string $name): ?VarietyMeasurement;

    public function findById(Uuid $id): ?VarietyMeasurement;

}