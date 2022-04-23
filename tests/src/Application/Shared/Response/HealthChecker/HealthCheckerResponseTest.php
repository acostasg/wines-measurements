<?php

declare(strict_types=1);

namespace Tests\IsEazy\WinesMesasurements\Application\Shared\Response\HealthChecker;

use IsEazy\DddTestPack\PhpUnit\TestCase;
use IsEazy\WinesMesasurements\Application\Shared\Response\HealthChecker\HealthCheckerResponse;

class HealthCheckerResponseTest extends TestCase
{
    public const DEFAULT_STATUS_NAME = 'OK';

    public function testConstructor(): void
    {
        $healthCheckerResponse = self::newHealthCheckerResponse(
            self::DEFAULT_STATUS_NAME
        );

        self::assertSame(self::DEFAULT_STATUS_NAME, $healthCheckerResponse->getStatusName());
    }

    public static function newHealthCheckerResponse(
        ?string $statusName = null
    ): HealthCheckerResponse {
        return new HealthCheckerResponse(
            $statusName ?? self::DEFAULT_STATUS_NAME
        );
    }
}
