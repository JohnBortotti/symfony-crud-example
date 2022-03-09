<?php

namespace App\Application\Student\Actions;

use App\Domain\Student\Interfaces\StudentRepositoryInterface;

class GetAllStudents
{
    public function __construct(
        private StudentRepositoryInterface $repository
    ) {}

    public function handle()
    {
        return $this->repository->getAllStudents();
    }
}