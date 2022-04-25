<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Create;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\TypeMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\VarietyMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\MeasurementRepository;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\Wine\Model\Wine;

class MeasurementCreator
{

    private MeasurementRepository $measurementRepository;

    public function __construct(
        MeasurementRepository $measurementRepository
    )
    {
        $this->measurementRepository = $measurementRepository;
    }

    public function __invoke(
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
    ) : Measurement
    {
        $measurement = Measurement::create(
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

        $this->measurementRepository->save($measurement);

        return $measurement;
    }

}