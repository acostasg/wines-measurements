<?php

namespace IsEazy\WinesMesasurements\Domain\Wine\Repository;

use IsEazy\WinesMesasurements\Domain\Wine\Model\Wine;
use Symfony\Component\Uid\Uuid;

interface WineRepository
{
    public function findAll(): array;

    public function findById(Uuid $id): ?Wine;

    public function save(Wine $wine): void;

    public function remove(Wine $wine): void;
}