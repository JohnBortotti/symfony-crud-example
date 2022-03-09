<?php

namespace App\Repository;

use App\Domain\Course\Interfaces\CourseRepositoryInterface;
use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CourseRepository extends ServiceEntityRepository implements CourseRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }


    public function getAllCourses(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c
            FROM App\Entity\Course c
            WHERE c.deleted_at IS NULL
            ORDER BY c.start_at DESC'
        );

        return $query->getResult();
    }

    public function getCourseById(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c
            FROM App\Entity\Course c
            WHERE c.id = :id
            AND c.deleted_at IS NULL'
        )->setParameter('id', $id);


        return $query->getResult();
    }

    public function createCourse(Course $course)
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($course);
        $entityManager->flush();
    }

    public function updateCourse(Course $course)
    {
        $entityManager = $this->getEntityManager();

        $entityManager->flush();
    }
}
