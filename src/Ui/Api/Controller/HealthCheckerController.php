<?php

declare(strict_types=1);

namespace IsEazy\WinesMesasurements\Ui\Api\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use Fos\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use IsEazy\WinesMesasurements\Application\Shared\Response\HealthChecker\HealthCheckerResponse;

class HealthCheckerController extends AbstractFOSRestController
{
    /**
     * @Get("/")
     *
     */
    public function getAction(): HealthCheckerResponse
    {
        return new HealthCheckerResponse('ok');
    }

    /**
     * @Get("/error")
     *
     */
    public function getErrorAction(): void
    {
        throw new NotFoundHttpException('ko');
    }

    /**
     * @Get("/validation-errors")
     *
     * @throws \Exception
     */
    public function getValidationErrorsAction(): void
    {
        $errors = [
            'foo' => 'bar',
            'bar' => 'foo',
        ];

        throw new \Exception($errors);
    }
}
