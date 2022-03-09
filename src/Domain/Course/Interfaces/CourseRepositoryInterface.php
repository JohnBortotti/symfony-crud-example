<?php

namespace App\Domain\Course\Interfaces;

use App\Entity\Course;

interface CourseRepositoryInterface
{
    public function getAllCourses(): array;
    public function getCourseById(int $id): array;
    public function createCourse(Course $student);
    public function updateCourse(Course $student);
}