<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Create;

use IsEazy\WinesMesasurements\Domain\Measurement\Exception\TypeMeasurementByNameNotFound;
use IsEazy\WinesMesasurements\Domain\Measurement\Exception\VarietyMeasurementByNameNotFound;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Create\MeasurementCreator;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Find\TypeMeasurementByNameFinder;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Find\VarietyMeasurementByNameFinder;
use IsEazy\WinesMesasurements\Domain\User\Exception\UserNotFound;
use IsEazy\WinesMesasurements\Domain\User\Service\Get\UserGetter;
use IsEazy\WinesMesasurements\Domain\Wine\Exception\WineNotFound;
use IsEazy\WinesMesasurements\Domain\Wine\Service\Get\WineGetter;
use Symfony\Component\Uid\Uuid;

class CreateMeasurementCommandHandler
{
    private MeasurementCreator $measurementCreator;
    private UserGetter $userGetter;
    private WineGetter $wineGetter;
    private VarietyMeasurementByNameFinder $varietyMeasurementByNameFinder;
    private TypeMeasurementByNameFinder $typeMeasurementByNameFinder;


    public function __construct(
        MeasurementCreator             $measurementCreator,
        UserGetter                     $userGetter,
        WineGetter                     $wineGetter,
        VarietyMeasurementByNameFinder $varietyMeasurementByNameFinder,
        TypeMeasurementByNameFinder    $typeMeasurementByNameFinder
    )
    {
        $this->measurementCreator = $measurementCreator;
        $this->userGetter = $userGetter;
        $this->wineGetter = $wineGetter;

        $this->varietyMeasurementByNameFinder = $varietyMeasurementByNameFinder;
        $this->typeMeasurementByNameFinder = $typeMeasurementByNameFinder;
    }

    /**
     * @throws UserNotFound
     * @throws WineNotFound
     * @throws VarietyMeasurementByNameNotFound
     * @throws TypeMeasurementByNameNotFound
     */
    public function __invoke(
        CreateMeasurementCommand $command
    ): Measurement
    {

        $owner = $this->userGetter->__invoke(
            Uuid::fromString($command->getUserId())
        );

        $wine = $this->wineGetter->__invoke(
            Uuid::fromString($command->getWineId())
        );

        $varietyMeasurement = $this->varietyMeasurementByNameFinder->__invoke(
            $command->getVarietyMeasurement()
        );

        $typeMeasurement = $this->typeMeasurementByNameFinder->__invoke(
            $command->getMeasurementType()
        );

        return $this->measurementCreator->__invoke(
            $owner,
            $wine,
            $command->getYear(),
            $varietyMeasurement,
            $typeMeasurement,
            $command->getColor(),
            $command->getTemperature(),
            $command->getGraduation(),
            $command->getPh(),
            $command->getObservations()
        );
    }
}