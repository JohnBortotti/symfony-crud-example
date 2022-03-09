<?php

namespace App\Application\Registration\Resources;

use App\Domain\Registration\Interfaces\RegistrationResourceableInterface;

class RegistrationResource
{
    public function __construct(private RegistrationResourceableInterface $registration)
    {
    }

    public function toArray()
    {
        return [
            'id' => $this->registration->getId(),
            'course' => $this->registration->getCourse(),
            'student' => $this->registration->getStudent(),
            'user' => $this->registration->getUser(),
            'date' => $this->registration->getDate(),
        ];
    }
}
