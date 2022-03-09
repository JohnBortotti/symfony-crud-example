<?php

namespace App\Domain\Registration\Interfaces;

use App\Entity\Registration;

interface RegistrationRepositoryInterface
{
    public function getAllRegistrations(): array;
    public function getRegistrationById(int $id): array;
    public function createRegistration(Registration $registration);
    public function updateRegistration(Registration $registration);
}
