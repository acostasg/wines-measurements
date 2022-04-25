<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Count;

use IsEazy\WinesMesasurements\Domain\Measurement\Repository\MeasurementRepository;
use IsEazy\WinesMesasurements\Domain\User\Model\User;

class MeasurementByOwnerCounter
{
    private MeasurementRepository $measurementRepository;

    public function __construct(
        MeasurementRepository $measurementRepository
    )
    {
        $this->measurementRepository = $measurementRepository;
    }

    public function __invoke(User $user): int
    {
        return $this->measurementRepository->findCountByOwner($user) ?? 0;
    }
}