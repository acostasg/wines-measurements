<?php

namespace IsEazy\WinesMesasurements\Domain\TypeSensor\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use Symfony\Component\Uid\Uuid;

class TypeSensor extends AggregateRoot
{
    private Uuid $id;
    private string $name;

    public function __construct(
        Uuid $id,
        string $name
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

}