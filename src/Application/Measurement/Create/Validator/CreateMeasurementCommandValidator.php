<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Create\Validator;

use IsEazy\WinesMesasurements\Application\Measurement\Create\CreateMeasurementCommand;

class CreateMeasurementCommandValidator
{
        public function __invoke(
            CreateMeasurementCommand $command
        )
        {
            $errors = [];

            if (empty($command->getUserId())) {
                $errors[] = 'Owner is required';
            }

            if (empty($command->getWineId())) {
                $errors[] = 'Wine is required';
            }

            if (empty($command->getYear())) {
                $errors[] = 'Type is required';
            }

            if (empty($command->getVarietyMeasurement())) {
                $errors[] = 'Varierty is required';
            }

            //TODO add valitation and used symfony validator with interface

            if (count($errors) > 0) {
                throw new \Exception(implode(' ', $errors));
            }
        }
}