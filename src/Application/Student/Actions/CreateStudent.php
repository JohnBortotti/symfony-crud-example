<?php

namespace App\Application\Student\Actions;

use App\Domain\Student\Interfaces\StudentRepositoryInterface;
use App\Entity\Student;

class CreateStudent
{
    public function __construct(
        private StudentRepositoryInterface $repository,
        private Student $student
    ) {
    }

    public function handle()
    {
        return $this->repository->createStudent($this->student);
    }
}
