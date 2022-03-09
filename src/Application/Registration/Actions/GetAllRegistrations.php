<?php

namespace App\Application\Registration\Actions;

use App\Domain\Registration\Interfaces\RegistrationRepositoryInterface;

class GetAllRegistrations
{
    public function __construct(
        private RegistrationRepositoryInterface $repository,
    ) {
    }

    public function handle()
    {
        return $this->repository->getAllRegistrations();
    }
}
