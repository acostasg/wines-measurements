<?php

namespace IsEazy\WinesMesasurements\Infrastructure\Shared\Doctrine\Repository;

use IsEazy\WinesMesasurements\Domain\User\Model\User;
use IsEazy\WinesMesasurements\Domain\User\Repository\UserRepository;
use Symfony\Component\Uid\Uuid;

class UserDoctrineRepository extends DoctrineRepository implements UserRepository
{

    public function findAll(): array
    {
        return $this->getRepository()
            ->findAll();
    }

    public function findById(Uuid $id): ?User
    {
        return $this->getRepository()
            ->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->getRepository()
            ->findOneBy(['email' => $email]);
    }

    public function save(User $user): void
    {
        $this->getEntityManager()
            ->persist($user);
    }

    public function remove(User $user): void
    {
        $this->getEntityManager()->remove($user);
    }

    public function getRepositoryName(): string
    {
        return User::class;
    }
}