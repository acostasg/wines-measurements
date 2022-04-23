<?php

namespace IsEazy\WinesMesasurements\Ui\Twig\Controller;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthController extends AbstractController
{
    /**
     * @Get("/login")
     *
     */
    public function login(): Response
    {
        return $this->render('Auth/login.html.twig');
    }
}