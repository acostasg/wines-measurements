<?php

namespace IsEazy\WinesMesasurements\Application\User\Create;

use IsEazy\WinesMesasurements\Application\User\Exception\UserAlreadyExistsException;
use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\User\Service\Create\UserCreator;
use IsEazy\WinesMesasurements\Domain\User\Service\Finder\UserByEmailFinder;

class CreateUserCommandHandler
{

    private UserCreator $creator;
    private UserByEmailFinder $finder;

    public function __construct(
        UserCreator       $creator,
        UserByEmailFinder $finder
    )
    {
        $this->creator = $creator;
        $this->finder = $finder;
    }

    /**
     * @throws UserAlreadyExistsException
     */
    public function __invoke(CreateUserCommand $command): User
    {
        $userValidation = $this->finder->__invoke($command->getEmail());

        if (null !== $userValidation) {
            throw new UserAlreadyExistsException();
        }

        return $this->creator->__invoke(
            $command->getEmail(),
            $command->getPassword()
        );
    }
}