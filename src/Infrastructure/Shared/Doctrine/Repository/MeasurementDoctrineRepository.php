<?php

namespace IsEazy\WinesMesasurements\Infrastructure\Shared\Doctrine\Repository;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\MeasurementRepository;
use IsEazy\WinesMesasurements\Domain\User\Model\User;

class MeasurementDoctrineRepository extends DoctrineRepository implements MeasurementRepository
{
    public function findById(int $id): ?Measurement
    {
        return $this->getRepository()->find($id);
    }

    public function findAllByOwner(User $owner): array
    {
        return $this->getRepository()->findBy(['owner' => $owner]);
    }

    public function findCountByOwner(User $owner): int
    {
        return $this->getRepository()->count(['owner' => $owner]);
    }

    public function save(Measurement $measurement): void
    {
        $this->getEntityManager()->persist($measurement);
    }

    public function remove(Measurement $measurement): void
    {
        $this->getEntityManager()->remove($measurement);
    }

    protected function getRepositoryName(): string
    {
        return Measurement::class;
    }
}