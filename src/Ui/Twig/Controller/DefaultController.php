<?php

namespace IsEazy\WinesMesasurements\Ui\Twig\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use IsEazy\WinesMesasurements\Application\Measurement\Find\FindAllMeasurementByUserQuery;
use IsEazy\WinesMesasurements\Application\Measurement\Find\FindAllMeasurementByUserQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{

    /**
     * @var Security
     */
    private $security;

    /** @TODO change this for query bus  */
    private FindAllMeasurementByUserQueryHandler $findAllMeasurementByUserQueryHandler;

    public function __construct(
        Security $security,
        FindAllMeasurementByUserQueryHandler $findAllMeasurementByUserQueryHandler
    )
    {
        $this->security = $security;
        $this->findAllMeasurementByUserQueryHandler = $findAllMeasurementByUserQueryHandler;
    }

    /**
     * @Get("/")
     *
     */
    public function defaultAction()
    {
        return $this->redirect('/home');
    }

    /**
     * @Get("/home")
     *
     */
    public function homeAction()
    {
        $user = $this->security->getUser();
        $measurements = $this->findAllMeasurementByUserQueryHandler->__invoke(
            new FindAllMeasurementByUserQuery($user->getId())
        );
        return $this->render(
            'Measurements/home.html.twig',
            [
                'measurements' => $measurements
            ]
        );
    }
}