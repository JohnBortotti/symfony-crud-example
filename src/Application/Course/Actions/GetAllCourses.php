<?php

namespace App\Application\Course\Actions;

use App\Domain\Course\Interfaces\CourseRepositoryInterface;

class GetAllCourses
{
    public function __construct(
        private CourseRepositoryInterface $repository,
    ) {
    }

    public function handle()
    {
        return $this->repository->getAllCourses();
    }
}
