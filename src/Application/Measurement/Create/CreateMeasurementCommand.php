<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Create;

class CreateMeasurementCommand
{
    private string $userId;
    private string $wineId;
    private int $year;
    private string $measurementType;
    private string $varietyMeasurement;
    private string $color;
    private int $temperature;
    private int $graduation;
    private int $ph;
    private string $observations;

    public function __construct(
        string $userId,
        string $wineId,
        int    $year,
        string $measurementType,
        string $varietyMeasurement,
        string $color,
        int    $temperature,
        int    $graduation,
        int    $ph,
        string $observations
    )
    {

        $this->userId = $userId;
        $this->wineId = $wineId;
        $this->year = $year;
        $this->measurementType = $measurementType;
        $this->varietyMeasurement = $varietyMeasurement;
        $this->color = $color;
        $this->temperature = $temperature;
        $this->graduation = $graduation;
        $this->ph = $ph;
        $this->observations = $observations;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getWineId(): string
    {
        return $this->wineId;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMeasurementType(): string
    {
        return $this->measurementType;
    }

    public function getVarietyMeasurement(): string
    {
        return $this->varietyMeasurement;
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
}