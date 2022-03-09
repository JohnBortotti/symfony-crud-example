<?php

namespace App\Application\Student\Resources;

use App\Domain\Student\Interfaces\StudentResourceableInterface;

class StudentResource
{
    public function __construct(private StudentResourceableInterface $student)
    {
    }

    public function toArray()
    {
        return [
            'id' => $this->student->getId(),
            'name' => $this->student->getName(),
            'email' => $this->student->getEmail(),
            'birthDate' => $this->student->getBirthdate(),
        ];
    }
}
