<?php

namespace App\Repository;

use App\Domain\Registration\Interfaces\RegistrationRepositoryInterface;
use App\Entity\Registration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RegistrationRepository extends ServiceEntityRepository implements RegistrationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registration::class);
    }

    public function getAllRegistrations(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Registration r
            WHERE r.deleted_at IS NULL
            ORDER BY r.date DESC'
        );

        return $query->getResult();
    }

    public function getRegistrationById(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Registration r
            WHERE r.id = :id
            AND r.deleted_at IS NULL'
        )->setParameter('id', $id);

        return $query->getResult();
    }

    public function createRegistration(Registration $registration)
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($registration);
        $entityManager->flush();
    }

    public function updateRegistration(Registration $registration)
    {
        $entityManager = $this->getEntityManager();

        $entityManager->flush();
    }
}
