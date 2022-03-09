<?php

namespace App\Domain\Student\Interfaces;

use App\Entity\Student;

interface StudentRepositoryInterface
{
    public function getAllStudents(): array;
    public function getStudentById(int $id): array;
    public function createStudent(Student $student);
    public function updateStudent(Student $student);
}