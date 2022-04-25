<?php

declare(strict_types=1);

namespace IsEazy\WinesMesasurements\Application\Shared\Response\HealthChecker;

class HealthCheckerResponse
{
    private string $statusName;

    public function __construct(string $status)
    {
        $this->statusName = $status;
    }

    public function getStatusName(): string
    {
        return $this->statusName;
    }
}
