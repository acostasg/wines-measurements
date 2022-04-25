<?php

namespace IsEazy\WinesMesasurements\Domain\User\Model;

use IsEazy\WinesMesasurements\Domain\Shared\Model\AggregateRoot;
use Symfony\Component\Uid\Uuid;

class User extends AggregateRoot
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

}