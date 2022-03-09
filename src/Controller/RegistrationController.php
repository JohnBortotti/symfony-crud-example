<?php

namespace App\Controller;

use App\Application\Registration\Actions\GetAllRegistrations;
use App\Application\Registration\Resources\RegistrationResource;
use App\Repository\RegistrationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/registrations')]
class RegistrationController extends AbstractController
{
    #[Route('/', name: "registrations_list", methods: "GET")]
    public function registrations(ManagerRegistry $doctrine): JsonResponse
    {
        try {
            $repository = new RegistrationRepository($doctrine);
            $action = new GetAllRegistrations($repository);

            $registrations = $action->handle();
            $resultArray = [];

            dd($registrations[0]->getStudent());

            foreach ($registrations as $registration) {
                array_push($resultArray, (new RegistrationResource($registration))->toArray());
            }

            return new JsonResponse($resultArray);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }
}
