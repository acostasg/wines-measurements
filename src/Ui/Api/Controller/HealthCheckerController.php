<?php

declare(strict_types=1);

namespace IsEazy\WinesMesasurements\Ui\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use IsEazy\WinesMesasurements\Application\Shared\Response\HealthChecker\HealthCheckerResponse;

class HealthCheckerController extends AbstractController
{
    /**
     * @Rest\Get("/")
     *
     * @Rest\View(serializerGroups={"Api"})
     */
    public function getAction(): HealthCheckerResponse
    {
        return new HealthCheckerResponse('ok');
    }

    /**
     * @Rest\Get("/error")
     *
     * @Rest\View(serializerGroups={"Api"})
     */
    public function getErrorAction(): void
    {
        throw new NotFoundHttpException('ko');
    }

    /**
     * @Rest\Get("/validation-errors")
     *
     * @Rest\View(serializerGroups={"Api"})
     *
     */
    public function getValidationErrorsAction(): void
    {
        $errors = [
            'foo' => 'bar',
            'bar' => 'foo',
        ];

        throw new Exception($errors);
    }
}
