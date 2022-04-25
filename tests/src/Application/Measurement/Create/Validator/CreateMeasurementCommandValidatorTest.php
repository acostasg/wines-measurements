<?php

namespace Tests\IsEazy\WinesMesasurements\Application\Measurement\Create\Validator;

use IsEazy\WinesMesasurements\Application\Measurement\Create\Validator\CreateMeasurementCommandValidator;
use PHPUnit\Framework\TestCase;

class CreateMeasurementCommandValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_return_true_when_validation_passes()
    {
        $validator = new CreateMeasurementCommandValidator();
        $this->assertTrue($validator->validate(['name' => 'test']));
    }

    /**
     * @test
     */
    public function it_should_return_false_when_validation_fails()
    {
        $validator = new CreateMeasurementCommandValidator();
        $this->assertFalse($validator->validate(['name' => '']));
    }
}
