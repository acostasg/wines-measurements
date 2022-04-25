<?php

namespace IsEazy\WinesMesasurements\Infrastructure\Shared\Doctrine\Repository;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\TypeMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\TypeMeasurementRepository;
use Symfony\Component\Uid\Uuid;

class TypeMeasurementDoctrineRepository extends DoctrineRepository implements TypeMeasurementRepository
{
    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

    public function findByName(string $name): ?TypeMeasurement
    {
        return $this->getRepository()->findOneBy(['name' => $name]);
    }

    public function findById(Uuid $id): ?TypeMeasurement
    {
        return $this->getRepository()->find($id);
    }

    protected function getRepositoryName(): string
    {
        return TypeMeasurement::class;
    }
}