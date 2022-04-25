<?php

declare(strict_types=1);

namespace Tests\IsEazy\WinesMesasurements\Infrastructure\Shared\AliceHautelookFixtures\Traits;

use Fidry\AliceDataFixtures\LoaderInterface;
use Fidry\AliceDataFixtures\Persistence\PurgeMode;

trait AliceHautelookFixturesTrait
{
    public function runDatabaseFixtures(
        LoaderInterface $loader,
        string $basePath
    ): void {
        $environmentLessGlobPattern = sprintf('%s/*.*', $basePath);
        $fixturesFilesPaths = glob($environmentLessGlobPattern) ?: [];

        if (true === empty($fixturesFilesPaths)) {
            return;
        }

        $this->executeFixtures(
            $loader,
            $fixturesFilesPaths
        );
    }

    public function runOneDatabaseFixture(
        LoaderInterface $loader,
        string $fixtureFilePath
    ): void {
        $this->executeFixtures(
            $loader,
            [$fixtureFilePath]
        );
    }

    private function executeFixtures(
        LoaderInterface $loader,
        array $files
    ): void {
        $loader->load(
            $files,
            [],
            [],
            PurgeMode::createDeleteMode()
        );
    }
}
