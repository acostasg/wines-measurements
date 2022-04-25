<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Find;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\MeasurementRepository;
use IsEazy\WinesMesasurements\Domain\User\Model\User;

class AllMeasurementsByOwnerFinder
{

    private MeasurementRepository $measurementRepository;

    public function __construct(
        MeasurementRepository $measurementRepository
    )
    {
        $this->measurementRepository = $measurementRepository;
    }

    /**
     * @return Measurement[]
     */
    public function __invoke(
        User $owner
    ): array
    {
        return $this->measurementRepository->findAllByOwner($owner);
    }
}