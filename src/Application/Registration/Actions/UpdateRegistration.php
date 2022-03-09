<?php

namespace App\Application\Registration\Actions;

use App\Domain\Registration\Interfaces\RegistrationRepositoryInterface;
use App\Entity\Registration;

class UpdateRegistration
{
    public function __construct(
        private RegistrationRepositoryInterface $repository,
        private Registration $registration
    ) {
    }

    public function handle()
    {
        return $this->repository->updateRegistration($this->registration);
    }
}
