<?php

namespace IsEazy\WinesMesasurements\Domain\Wine\Exception;

use Symfony\Component\Uid\Uuid;

class WineNotFound extends \Exception
{

    public function __construct(Uuid $id)
    {
        parent::__construct(
            sprintf(
                'Wine with id %s not found',
                $id->jsonSerialize()
            )
        );
    }

}