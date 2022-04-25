<?php

namespace IsEazy\WinesMesasurements\Infrastructure\Shared\Doctrine\Repository;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\VarietyMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\VarietyMeasurementRepository;
use Symfony\Component\Uid\Uuid;

class VarietyMeasurementDoctrineRepository extends DoctrineRepository implements VarietyMeasurementRepository
{
    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

    public function findByName(string $name): ?VarietyMeasurement
    {
        return $this->getRepository()->findOneBy(['name' => $name]);
    }

    public function findById(Uuid $id): ?VarietyMeasurement
    {
        return $this->getRepository()->find($id);
    }

    protected function getRepositoryName(): string
    {
        return VarietyMeasurement::class;
    }
}