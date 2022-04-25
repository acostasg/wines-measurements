<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Find;

use IsEazy\WinesMesasurements\Domain\Measurement\Exception\VarietyMeasurementByNameNotFound;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\VarietyMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\VarietyMeasurementRepository;

class VarietyMeasurementByNameFinder
{
    private VarietyMeasurementRepository $varietyMeasurementRepository;

    public function __construct(
        VarietyMeasurementRepository $varietyMeasurementRepository
    )
    {
        $this->varietyMeasurementRepository = $varietyMeasurementRepository;
    }

    /**
     * @throws VarietyMeasurementByNameNotFound
     */
    public function __invoke(
        string $name
    ): VarietyMeasurement
    {
        $variantMeasurement = $this->varietyMeasurementRepository->findByName($name);

        if (null === $variantMeasurement) {
            throw new VarietyMeasurementByNameNotFound($name);
        }

        return $variantMeasurement;
    }
}