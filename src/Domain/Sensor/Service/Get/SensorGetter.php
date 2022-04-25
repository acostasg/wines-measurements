<?php

namespace IsEazy\WinesMesasurements\Domain\Sensor\Service\Get;

use IsEazy\WinesMesasurements\Domain\Sensor\Exception\SensorNotFound;
use IsEazy\WinesMesasurements\Domain\Sensor\Model\Sensor;
use IsEazy\WinesMesasurements\Domain\Sensor\Repository\SensorRepository;
use Symfony\Component\Uid\Uuid;

class SensorGetter
{
    private SensorRepository $sensorRepository;

    public function __construct(
         SensorRepository $sensorRepository
     )
     {
         $this->sensorRepository = $sensorRepository;
     }

    /**
     * @throws SensorNotFound
     */
    public function __invoke(
         Uuid $sensorId
     ) : Sensor
     {
         $sensor = $this->sensorRepository->findById($sensorId);

         if (null === $sensor){
            throw new SensorNotFound($sensorId);
         }

         return $sensor;
     }

}