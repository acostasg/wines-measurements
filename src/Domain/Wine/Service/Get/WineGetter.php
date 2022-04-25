<?php

namespace IsEazy\WinesMesasurements\Domain\Wine\Service\Get;

use IsEazy\WinesMesasurements\Domain\Wine\Exception\WineNotFound;
use IsEazy\WinesMesasurements\Domain\Wine\Model\Wine;
use IsEazy\WinesMesasurements\Domain\Wine\Repository\WineRepository;
use Symfony\Component\Uid\Uuid;

class WineGetter
{
    private WineRepository $wineRepository;

    public function __construct(
        WineRepository $wineRepository
    )
    {
        $this->wineRepository = $wineRepository;
    }

    /**
     * @throws WineNotFound
     */
    public function __invoke(
        Uuid $wineId
    ): Wine
    {
        $wine = $this->wineRepository->findById($wineId);

        if (null === $wine) {
            throw new WineNotFound($wineId);
        }

    }
}