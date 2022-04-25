<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Find;

use IsEazy\WinesMesasurements\Domain\Measurement\Model\Measurement;

class FindAllMeasurementByUserQueryHandler
{

    public function __invoke(
        FindAllMeasurementByUserQuery $query
    ) : array {
        return [];
    }
}