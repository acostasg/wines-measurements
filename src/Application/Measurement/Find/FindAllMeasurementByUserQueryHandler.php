<?php

namespace IsEazy\WinesMesasurements\Application\Measurement\Find;

use IsEazy\WinesMesasurements\Domain\Measurement\Service\Find\AllMeasurementsByOwnerFinder;
use IsEazy\WinesMesasurements\Domain\User\Service\Get\UserGetter;
use Symfony\Component\Uid\Uuid;

class FindAllMeasurementByUserQueryHandler
{
    private UserGetter $userGetter;
    private AllMeasurementsByOwnerFinder $finder;

    public function __construct(
        UserGetter $userGetter,
        AllMeasurementsByOwnerFinder $finder
    ){
        $this->userGetter = $userGetter;
        $this->finder = $finder;
    }
    public function __invoke(
        FindAllMeasurementByUserQuery $query
    ) : array {

        $uuidUser = Uuid::fromString($query->getUserId());

        $user = $this->userGetter->__invoke($uuidUser);
        return $this->finder->__invoke($user);
    }
}