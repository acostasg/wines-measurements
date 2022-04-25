<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use IsEazy\WinesMesasurements\Domain\TypeSensor\Model\TypeSensor;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use Symfony\Component\Uid\Uuid;

class Sensor extends AggregateRoot
{

    private Uuid $id;
    private User $owner;
    private string $valor;
    private TypeSensor $typeSensor;

    public function __construct(
        Uuid $id,
        User $owner,
        string $valor,
        TypeSensor $typeSensor
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->owner = $owner;
        $this->valor = $valor;
        $this->typeSensor = $typeSensor;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function getValor(): string
    {
        return $this->valor;
    }

    public function getTypeSensor(): TypeSensor
    {
        return $this->typeSensor;
    }

    public static function create(
        User $owner,
        string $valor,
        TypeSensor $typeSensor
    ): self
    {
        $id = Uuid::v4();

        $sensor = new self(
            $id,
            $owner,
            $valor,
            $typeSensor
        );

        $sensor->record(new SensorWasCreated($id, $owner, $valor, $typeSensor));

        return $sensor;
    }
}