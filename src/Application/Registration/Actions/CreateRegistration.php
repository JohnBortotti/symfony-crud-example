<?php

namespace App\Application\Registration\Actions;

use App\Domain\Registration\Interfaces\RegistrationRepositoryInterface;
use App\Entity\Registration;

class CreateRegistration
{
    public function __construct(
        private RegistrationRepositoryInterface $repository,
        private Registration $registration
    ) {
    }

    public function handle()
    {
        return $this->repository->createRegistration($this->registration);
    }
}
