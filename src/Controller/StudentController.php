<?php

namespace App\Controller;

use App\Application\Student\Actions\CreateStudent;
use App\Application\Student\Actions\GetAllStudents;
use App\Application\Student\Actions\GetStudentById;
use App\Application\Student\Actions\UpdateStudent;
use App\Application\Student\Resources\StudentResource;
use App\Entity\Student;
use App\Repository\StudentRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Component\HttpFoundation\Request;

#[Route('/students')]
class StudentController extends AbstractController
{
    #[Route('/', name: "students_list", methods: "GET")]
    public function users(ManagerRegistry $doctrine): JsonResponse
    {
        try {
            $repository = new StudentRepository($doctrine);
            $action = new GetAllStudents($repository);

            $students = $action->handle();

            $resultArray = [];

            foreach($students as $student) {
                array_push($resultArray, (new StudentResource($student))->toArray());
            };

            return new JsonResponse($resultArray);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/{id}', name: "students_list_by_id", methods: "GET")]
    public function user(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        try {
            $repository = new StudentRepository($doctrine);
            $action = new GetStudentById($repository, $id);

            $studentArray = $action->handle();

            if (!$studentArray) throw new Exception("model not found");

            $student = $studentArray[0];

            $resource = new StudentResource($student);

            return new JsonResponse($resource->toArray());
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/', name: "students_create", methods: "POST")]
    public function store(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        try {
            $params = $request->toArray();

            $repository = new StudentRepository($doctrine);

            $student = new Student();
            $student->setName($params['name']);
            $student->setEmail($params['email']);

            $birthDate = new DateTime($params['birthdate']);
            $student->setBirthdate($birthDate);

            $action = new CreateStudent($repository, $student);
            $action->handle();

            return new JsonResponse(['resource created successfully'], 201);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/{id}', name: "students_update", methods: "PATCH")]
    public function update(ManagerRegistry $doctrine, int $id, Request $request): JsonResponse
    {
        try {
            $params = $request->toArray();

            $repository = new StudentRepository($doctrine);
            $getByIdAction = new GetStudentById($repository, $id);

            $studentArray = $getByIdAction->handle();

            if (!isset($studentArray[0])) throw new Exception("model not found");

            $student = $studentArray[0];

            $student->setName($params['name']);
            $student->setEmail($params['email']);

            $birthDate = new DateTime($params['birthdate']);
            $student->setBirthdate($birthDate);

            $updateAction = new UpdateStudent($repository, $student);
            $updateAction->handle();

            return new JsonResponse(['resource updated successfully'], 202);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }


    #[Route('/{id}', name: "students_delete", methods: "DELETE")]
    public function delete(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        try {
            $repository = new StudentRepository($doctrine);
            $getByIdAction = new GetStudentById($repository, $id);

            $studentArray = $getByIdAction->handle();

            if (!isset($studentArray[0])) throw new Exception("model not found");

            $student = $studentArray[0];

            $student->setDeletedAt(new DateTime());

            $updateAction = new UpdateStudent($repository, $student);
            $updateAction->handle();

            return new JsonResponse(['resource deleted successfully'], 200);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }
}
