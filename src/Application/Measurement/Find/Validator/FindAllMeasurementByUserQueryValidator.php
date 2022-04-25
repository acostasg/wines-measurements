<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Find\Validator;

use IsEazy\WinesMesasurements\Application\Measurement\Find\FindAllMeasurementByUserQuery;

class FindAllMeasurementByUserQueryValidator
{
    public function __invoke(FindAllMeasurementByUserQuery $query)
    {
        if (empty($query->getUserId())) {
            throw new \InvalidArgumentException('User id is required');
        }
    }

}