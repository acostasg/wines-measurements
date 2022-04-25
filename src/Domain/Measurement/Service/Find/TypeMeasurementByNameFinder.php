<?php

namespace IsEazy\WinesMesasurements\Domain\Measurement\Service\Find;

use IsEazy\WinesMesasurements\Domain\Measurement\Exception\TypeMeasurementByNameNotFound;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\TypeMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Repository\TypeMeasurementRepository;

class TypeMeasurementByNameFinder
{
    private TypeMeasurementRepository $typeMeasurementRepository;

    public function __construct(
        TypeMeasurementRepository $typeMeasurementRepository
    )
    {
        $this->typeMeasurementRepository = $typeMeasurementRepository;
    }

    /**
     * @throws TypeMeasurementByNameNotFound
     */
    public function __invoke(
        string $name
    ): TypeMeasurement
    {
        $typeMeasurement = $this->typeMeasurementRepository->findByName($name);

        if (null === $typeMeasurement) {
            throw new TypeMeasurementByNameNotFound($name);
        }

        return $typeMeasurement;
    }
}