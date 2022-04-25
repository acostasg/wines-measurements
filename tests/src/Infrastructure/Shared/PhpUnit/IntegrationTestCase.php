<?php

declare(strict_types=1);

namespace Tests\IsEazy\WinesMesasurements\Infrastructure\Shared\PhpUnit;

use Doctrine\ORM\EntityManagerInterface;
use Fidry\AliceDataFixtures\LoaderInterface;
use IsEazy\Ddd\Application\Cqrs\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use BornFree\TacticianDomainEvent\Recorder\ContainsRecordedEvents;
use Tests\IsEazy\WinesMesasurements\Infrastructure\Shared\AliceHautelookFixtures\Traits\AliceHautelookFixturesTrait;

abstract class IntegrationTestCase extends WebTestCase
{
    use AliceHautelookFixturesTrait;
    use MockeryPHPUnitIntegration;

    private const FIXTURES_LOADER_ALIAS = 'fidry_alice_data_fixtures.doctrine.purger_loader';
    private const DOMAIN_EVENTS_COLLECTOR_ALIAS = 'tactician_domain_events.doctrine.event_collector';
    private const RELATIVE_FIXTURES_PATH = 'tests/database/Fixtures';

    private ?CommandBus $syncCommandBus = null;
    private ?LoaderInterface $fixturesLoader = null;
    private ?ContainsRecordedEvents $tacticianDomainEventsCollector = null;
    private ?EntityManagerInterface $entityManager = null;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
    }

    public function getCommandBus(): CommandBus
    {
        if (null === $this->syncCommandBus) {
            /** @var CommandBus $syncCommandBus */
            $syncCommandBus = self::$container->get(
                CommandBus::class
            );

            $this->syncCommandBus = $syncCommandBus;
        }

        return $this->syncCommandBus;
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        if (null === $this->entityManager) {
            /** @var EntityManagerInterface $entityManager */
            $entityManager = self::$container->get(
                'doctrine.orm.default_entity_manager'
            );

            $this->entityManager = $entityManager;
        }

        return $this->entityManager;
    }

    protected function initializeDatabaseFixtures(): void
    {
        if (null === $this->fixturesLoader) {
            $this->setFixturesLoader();
        }

        $this->runDatabaseFixtures(
            $this->fixturesLoader,
            sprintf(
                '%s/%s',
                self::$kernel->getProjectDir(),
                self::RELATIVE_FIXTURES_PATH
            )
        );

        $this->clearDomainEvents();
    }

    protected function loadFixture(
        string $fixtureFilename
    ): void {
        if (null === $this->fixturesLoader) {
            $this->setFixturesLoader();
        }

        $this->runOneDatabaseFixture(
            $this->fixturesLoader,
            sprintf(
                '%s/%s/%s',
                self::$kernel->getProjectDir(),
                self::RELATIVE_FIXTURES_PATH,
                $fixtureFilename
            )
        );

        $this->clearDomainEvents();
    }

    protected function clearDomainEvents(): void
    {
        $this->getDomainEventsCollector()->releaseEvents();
    }

    private function setFixturesLoader(): void
    {
        /** @var LoaderInterface $fixturesLoader */
        $fixturesLoader = self::$container->get(
            self::FIXTURES_LOADER_ALIAS
        );

        $this->fixturesLoader = $fixturesLoader;
    }

    private function getDomainEventsCollector(): ContainsRecordedEvents
    {
        if (null === $this->tacticianDomainEventsCollector) {
            /** @var ContainsRecordedEvents $eventsCollector */
            $eventsCollector = self::$container->get(
                self::DOMAIN_EVENTS_COLLECTOR_ALIAS
            );

            $this->tacticianDomainEventsCollector = $eventsCollector;
        }

        return $this->tacticianDomainEventsCollector;
    }
}
