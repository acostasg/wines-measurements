<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\Wine\Model\Wine;
use Symfony\Component\Uid\Uuid;

class Measurement extends AggregateRoot
{
    private Uuid $id;
    private User $owner;
    private Wine $wine;
    private int $year;
    private VarietyMeasurement $varietyMeasurement;
    private TypeMeasurement $typeMeasurement;
    private string $color;
    private int $temperature;
    private int $graduation;
    private int $ph;
    private string $observations;

    public function __construct(
        Uuid               $id,
        User               $owner,
        Wine               $wine,
        int                $year,
        VarietyMeasurement $varietyMeasurement,
        TypeMeasurement    $typeMeasurement,
        string             $color,
        int                $temperature,
        int                $graduation,
        int                $ph,
        string             $observations
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->wine = $wine;
        $this->year = $year;
        $this->varietyMeasurement = $varietyMeasurement;
        $this->typeMeasurement = $typeMeasurement;
        $this->color = $color;
        $this->temperature = $temperature;
        $this->graduation = $graduation;
        $this->ph = $ph;
        $this->observations = $observations;
        $this->owner = $owner;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function getWine(): Wine
    {
        return $this->wine;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getVarietyMeasurement(): VarietyMeasurement
    {
        return $this->varietyMeasurement;
    }

    public function getTypeMeasurement(): TypeMeasurement
    {
        return $this->typeMeasurement;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }

    public function getGraduation(): int
    {
        return $this->graduation;
    }

    public function getPh(): int
    {
        return $this->ph;
    }

    public function getObservations(): string
    {
        return $this->observations;
    }

    public static function create(
        User               $owner,
        Wine               $wine,
        int                $year,
        VarietyMeasurement $varietyMeasurement,
        TypeMeasurement    $typeMeasurement,
        string             $color,
        int                $temperature,
        int                $graduation,
        int                $ph,
        string             $observations
    ): self
    {
        return new self(
            Uuid::v4(),
            $owner,
            $wine,
            $year,
            $varietyMeasurement,
            $typeMeasurement,
            $color,
            $temperature,
            $graduation,
            $ph,
            $observations
        );
    }
}