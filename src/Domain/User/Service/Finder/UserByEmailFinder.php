<?php

namespace IsEazy\WinesMesasurements\Domain\User\Service\Finder;

use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\User\Repository\UserRepository;

class UserByEmailFinder
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(
        string $email
    ): ?User
    {
        return $this->userRepository->findByEmail($email);
    }
}