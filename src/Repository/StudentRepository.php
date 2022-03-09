<?php

namespace App\Repository;

use App\Domain\Student\Interfaces\StudentRepositoryInterface;
use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StudentRepository extends ServiceEntityRepository implements StudentRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    public function getAllStudents(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s
            FROM App\Entity\Student s
            WHERE s.deleted_at IS NULL
            ORDER BY s.name ASC'
        );

        return $query->getResult();
    }

    public function getStudentById(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s
            FROM App\Entity\Student s
            WHERE s.id = :id
            AND s.deleted_at IS NULL'
        )->setParameter('id', $id);

        return $query->getResult();
    }

    public function createStudent(Student $student)
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($student);
        $entityManager->flush();
    }

    public function updateStudent(Student $student)
    {
        $entityManager = $this->getEntityManager();
        
        $entityManager->flush();
    }
}
