<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Event;

use IsEazy\WinesMesasurements\Domain\TypeSensor\Model\TypeSensor;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use Symfony\Component\Uid\Uuid;

class SensorWasCreated
{
    private Uuid $id;
    private User $owner;
    private string $valor;
    private TypeSensor $typeSensor;

    public function __construct(
        Uuid $id,
        User $owner,
        String $valor,
        TypeSensor $typeSensor
    )
     {
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



}

