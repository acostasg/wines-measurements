<?php

namespace IsEazy\WinesMesasurements\Application\User\Exception;

class UserAlreadyExistsException extends \Exception
{

    public function __construct()
    {
        parent::__construct('User already exists');
    }

}