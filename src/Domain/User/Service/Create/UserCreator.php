<?php

namespace IsEazy\WinesMesasurements\Domain\User\Service\Create;

use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\User\Repository\UserRepository;

class UserCreator
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(
        $email,
        $password
    ): User
    {
        $user = User::create();

        $this->userRepository->save($user);
        return $user;
    }
}