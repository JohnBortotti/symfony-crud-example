<?php

namespace App\Application\User\Actions;

use App\Domain\User\Interfaces\UserRepositoryInterface;

class GetUsers
{
    public function __construct(
        private UserRepositoryInterface $repository
    ) {}

    public function handle()
    {
        return $this->repository->get();
    }
}