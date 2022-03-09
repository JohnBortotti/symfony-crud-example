<?php

namespace App\Application\Course\Actions;

use App\Domain\Course\Interfaces\CourseRepositoryInterface;
use App\Entity\Course;

class CreateCourse
{
    public function __construct(
        private CourseRepositoryInterface $repository,
        private Course $course
    ) {
    }

    public function handle()
    {
        return $this->repository->createCourse($this->course);
    }
}
