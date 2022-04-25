<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Get;

use IsEazy\WinesMesasurements\Domain\Measurement\Exception\MeasurementNotFound;
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

    /**
     * @throws MeasurementNotFound
     */
    public function __invoke(
        Uuid $id
    ): Measurement
    {
        $measurement = $this->measurementRepository->findById($id);

        if (null === $measurement){
            throw new MeasurementNotFound($id);
        }

        return $measurement;
    }

}