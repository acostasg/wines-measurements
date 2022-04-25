<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use Symfony\Component\Uid\Uuid;

class TypeMeasurement extends AggregateRoot
{

    public function __construct(
        Uuid $id,
        string $name,
        string $description
    ) {
        parent::__construct();

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}

