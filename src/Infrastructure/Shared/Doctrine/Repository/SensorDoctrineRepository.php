<?php

namespace IsEazy\WinesMesasurements\Infrastructure\Shared\Doctrine\Repository;

use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use IsEazy\WinesMesasurements\Domain\Sensor\Repository\SensorRepository;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use Symfony\Component\Uid\Uuid;

class SensorDoctrineRepository extends DoctrineRepository implements SensorRepository
{

    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

    public function findById(Uuid $id): ?Sensor
    {
        return $this->getRepository()->find($id);
    }

    public function findByName(string $name): Sensor
    {
        $this->getRepository()->findOneBy(['name' => $name]);
    }

    public function findByOwner(User $name): array
    {
        return $this->getRepository()->findBy(['owner' => $name]);
    }

    public function findByType($type): array
    {
        return $this->getRepository()->findBy(['type' => $type]);
    }

    public function save(Sensor $sensor): void
    {
        $this->getEntityManager()->persist($sensor);
    }

    protected function getRepositoryName(): string
    {
        return Sensor::class;
    }
}