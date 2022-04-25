<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Create;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Create\MeasurementCreator;
use IsEazy\WinesMesasurements\Domain\User\Service\Get\UserGetter;
use Symfony\Component\Uid\Uuid;

class CreateMeasurementCommandHandler
{
    private MeasurementCreator $measurementCreator;
    private UserGetter $userGetter;
    private WineGetter $wineGetter;
    private FindVarietyMeasurementByName $findVarietyMeasurementByName;
    private FindTypeMeasurementByName $findTypeMeasurementByName;


    public function __construct(
        MeasurementCreator $measurementCreator,
        UserGetter $userGetter,
        WineGetter $wineGetter,
        FindVarietyMeasurementByName $findVarietyMeasurementByName,
        FindTypeMeasurementByName $findTypeMeasurementByName
    )
    {
        $this->measurementCreator = $measurementCreator;
        $this->userGetter = $userGetter;
        $this->wineGetter = $wineGetter;

        $this->findVarietyMeasurementByName = $findVarietyMeasurementByName;
        $this->findTypeMeasurementByName = $findTypeMeasurementByName;
    }

    public function __invoke(
        CreateMeasurementCommand $command
    ) : Measurement {

        $owner = $this->userGetter->__invoke(
            Uuid::fromString($command->getUserId())
        );

        $wine = $this->wineGetter->__invoke(
            Uuid::fromString($command->getWineId())
        );

        $varietyMeasurement = $this->findVarietyMeasurementByName->__invoke(
            $command->getVarietyMeasurement()
        );

        $typeMeasurement = $this->findTypeMeasurementByName->__invoke(
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