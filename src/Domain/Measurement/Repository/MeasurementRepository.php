<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Repository;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\User\Model\User;

interface MeasurementRepository
{
    public function findById(int $id): ?Measurement;

    /**
     * @return Measurement[]
     */
    public function findAllByOwner(User $owner): array;

    public function save(Measurement $measurement): void;

    public function remove(Measurement $measurement): void;
}