<?php

namespace App\Application\Student\Actions;

use App\Domain\Student\Interfaces\StudentRepositoryInterface;

class GetStudentById
{
    public function __construct(
        private StudentRepositoryInterface $repository,
        private int $id
    ) {}

    public function handle()
    {
        return $this->repository->getStudentById($this->id);
    }
}