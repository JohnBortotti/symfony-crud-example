<?php

namespace App\Application\Registration\Actions;

use App\Domain\Registration\Interfaces\RegistrationRepositoryInterface;

class GetRegistrationById
{
    public function __construct(
        private RegistrationRepositoryInterface $repository,
        private int $id
    ) {
    }

    public function handle()
    {
        return $this->repository->getRegistrationById($this->id);
    }
}
