<?php

namespace App\Application\Course\Actions;

use App\Domain\Course\Interfaces\CourseRepositoryInterface;

class GetCourseById
{
    public function __construct(
        private CourseRepositoryInterface $repository,
        private int $id
    ) {
    }

    public function handle()
    {
        return $this->repository->getCourseById($this->id);
    }
}
