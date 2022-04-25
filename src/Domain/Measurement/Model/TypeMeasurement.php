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

    public static function create(
        string $name,
        string $description
    ): TypeMeasurement {
        $id = Uuid::v4();
        $typeMeasurement = new TypeMeasurement(
            $id,
            $name,
            $description
        );

        /**
         * sample to use event store
         *
         * $typeMeasurement->record(
            new TypeMeasurementWasCreated(
                $id,
                $name,
                $description
            )
        );*/

        return $typeMeasurement;
    }

}

