<?php

namespace App\Controller;

use App\Application\User\Actions\GetUsers;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @Route("/users")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="users_list")
     */
    public function users(ManagerRegistry $doctrine): JsonResponse
    {
        $repository = new UserRepository($doctrine);
        $action = new GetUsers($repository);

        dd([$action->handle()]);
        
        return new JsonResponse([$repository->getUsers()]);
    }
}
