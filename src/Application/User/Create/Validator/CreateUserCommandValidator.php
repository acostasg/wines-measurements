<?php

namespace IsEazy\WinesMesasurements\Application\User\Create\Validator;

use IsEazy\WinesMesasurements\Application\User\Create\CreateUserCommand;

class CreateUserCommandValidator
{
    public function __invoke(CreateUserCommand $command)
    {
        $errors = [];
        //TODO use symfony validations

        if (empty($command->name)) {
            $errors['name'] = 'Name is required';
        }

        if (empty($command->getEmail())) {
            $errors['email'] = 'Email is required';
        }

        if (empty($command->getPassword())) {
            $errors['password'] = 'Password is required';
        }

        if (!empty($errors)) {
            throw new \Exception('Validation failed', 422);
        }
    }
}