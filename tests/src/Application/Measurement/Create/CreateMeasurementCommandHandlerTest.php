<?php

namespace Tests\IsEazy\WinesMesasurements\Application\Measurement\Create;

use IsEazy\WinesMesasurements\Application\Measurement\Create\CreateMeasurementCommand;
use IsEazy\WinesMesasurements\Application\Measurement\Create\CreateMeasurementCommandHandler;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\TypeMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Model\VarietyMeasurement;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Create\MeasurementCreator;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Find\TypeMeasurementByNameFinder;
use IsEazy\WinesMesasurements\Domain\Measurement\Service\Find\VarietyMeasurementByNameFinder;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\User\Service\Get\UserGetter;
use IsEazy\WinesMesasurements\Domain\Wine\Model\Wine;
use IsEazy\WinesMesasurements\Domain\Wine\Service\Get\WineGetter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class CreateMeasurementCommandHandlerTest extends TestCase
{
    private CreateMeasurementCommandHandler $createMeasurementCommandHandler;

    /**
     * @var MeasurementCreator|MockObject
     */
    private $measurementCreator;

    /**
     * @var UserGetter|MockObject
     */
    private $userGetter;

    /**
     * @var WineGetter|MockObject
     */
    private $wineGetter;

    /**
     * @var TypeMeasurementByNameFinder|MockObject
     */
    private $varietyMeasurementByNameFinder;

    /**
     * @var VarietyMeasurementByNameFinder|MockObject
     */
    private $typeMeasurementByNameFinder;

    public function setUp(): void
    {

        $this->measurementCreator = $this->createMock(MeasurementCreator::class);
        $this->userGetter = $this->createMock(UserGetter::class);
        $this->wineGetter = $this->createMock(WineGetter::class);
        $this->varietyMeasurementByNameFinder = $this->createMock(VarietyMeasurementByNameFinder::class);
        $this->typeMeasurementByNameFinder = $this->createMock(TypeMeasurementByNameFinder::class);

        $this->createMeasurementCommandHandler = new CreateMeasurementCommandHandler(
            $this->measurementCreator,
            $this->userGetter,
            $this->wineGetter,
            $this->varietyMeasurementByNameFinder,
            $this->typeMeasurementByNameFinder
        );
    }

    /**
     * @test
     */
    public function testInvoke()
    {
        $command = new CreateMeasurementCommand(
            '1530085c-c4df-11ec-9d64-0242ac120002',
            '18501c66-c4df-11ec-9d64-0242ac120002',
            4,
            'typeMeasurementName',
            'varietyMeasurementName',
            'red',
            9,
            4,
            6,
            'test sample description'
        );

        $this->setMocks($command);

        $measurement = $this->createMeasurementCommandHandler->__invoke($command);

        $this->assertEquals($command->getUserId(), $measurement->getOwner()->getId());
        $this->assertEquals($command->getWineId(), $measurement->getWine()->getId());
        $this->assertEquals($command->getYear(), $measurement->getYear());
        $this->assertEquals($command->getMeasurementType(), $measurement->getVarietyMeasurement()->getName());
        $this->assertEquals($command->getMeasurementType(), $measurement->getTypeMeasurement()->getName());
        $this->assertEquals($command->getColor(), $measurement->getColor());
        $this->assertEquals($command->getTemperature(), $measurement->getTemperature());
        $this->assertEquals($command->getTemperature(), $measurement->getTemperature());
        $this->assertEquals($command->getGraduation(), $measurement->getGraduation());
        $this->assertEquals($command->getPh(), $measurement->getPh());
        $this->assertEquals($command->getObservations(), $measurement->getObservations());
    }

    /**
     * TODO extracto to base test o trait
     * @param CreateMeasurementCommand $command
     * @return void
     */
    public function setMocks(CreateMeasurementCommand $command): void
    {
        $this->userGetter->expects($this->once())
            ->method('__invoke')
            ->with($command->getUserId())
            ->willReturn(
                new User(
                    Uuid::fromString($command->getUserId()),
                    'testName',
                    'testPassword'
                )
            );

        $this->wineGetter->expects($this->once())
            ->method('__invoke')
            ->with($command->getWineId())
            ->willReturn(
                new Wine(
                    Uuid::fromString($command->getWineId()),
                    'testName',
                    'testProducer'
                )
            );

        $this->varietyMeasurementByNameFinder->expects($this->once())
            ->method('__invoke')
            ->with($command->getVarietyMeasurement())
            ->willReturn(
                new VarietyMeasurement(
                    Uuid::v4(),
                    $command->getVarietyMeasurement()
                )
            );

        $this->typeMeasurementByNameFinder->expects($this->once())
            ->method('__invoke')
            ->with($command->getMeasurementType())
            ->willReturn(
                new TypeMeasurement(
                    Uuid::v4(),
                    $command->getMeasurementType(),
                    'testDescription'
                )
            );

        $this->measurementCreator->expects($this->once())
            ->method('__invoke');
    }
}
