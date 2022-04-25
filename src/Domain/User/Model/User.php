<?php

namespace IsEazy\WinesMesasurements\Domain\User\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

class User extends AggregateRoot implements UserInterface
{
    private Uuid $id;
    private string $email;
    private string $password;

    public function __construct(
        Uuid $id,
        string $email,
        string $password
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return 'test';
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->email;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    public static function create(
        string $email,
        string $password
    ): self
    {
        return new self(
            Uuid::v4(),
            $email,
            $password
        );
    }
}