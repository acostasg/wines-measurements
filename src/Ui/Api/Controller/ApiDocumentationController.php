<?php

declare(strict_types=1);

namespace IsEazy\WinesMesasurements\Ui\Api\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiDocumentationController extends AbstractController
{
    public function getIndex(): RedirectResponse
    {
        return $this->redirect('/doc/index.html');
    }
}
