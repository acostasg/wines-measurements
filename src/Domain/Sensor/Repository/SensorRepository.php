<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Repository;

use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use Symfony\Component\Uid\Uuid;

interface SensorRepository
{
    /** @return Sensor[] */
    public function findAll(): array;

    public function findById(Uuid $id): ?Sensor;

    public function findByName(string $name): Sensor;

    /** @return Sensor[] */
    public function findByOwner(User $name): array;

    /** @return Sensor[] */
    public function findByType($type): array;

    public function save(Sensor $sensor): void;

}