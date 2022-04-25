<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use Symfony\Component\Uid\Uuid;

class VarietyMeasurement extends AggregateRoot
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

    public static function create(
        string $name
    ): VarietyMeasurement
    {
        $id = Uuid::v4();

        $varietyMeasurement = new VarietyMeasurement(
            $id,
            $name
        );

        /**
          // sample event
        $varietyMeasurement->record(
            new VarietyMeasurementCreated(
                $id,
                $name
            )
        );*/

        return $varietyMeasurement;
    }

}