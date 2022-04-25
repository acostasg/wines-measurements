<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Get;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\MeasurementRepository;
use Symfony\Component\Uid\Uuid;

class MeasurementGetter
{
    private MeasurementRepository $measurementRepository;

    public function __construct(
        MeasurementRepository $measurementRepository
    )
    {
        $this->measurementRepository = $measurementRepository;
    }

    public function __invoke(
        Uuid $id
    ): Measurement
    {
        $measurement = $this->measurementRepository->findById($id);

        if (null === $measurement){

        }
        return $measurement;
    }

}