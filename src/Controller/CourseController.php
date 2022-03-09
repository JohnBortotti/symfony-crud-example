<?php

namespace App\Controller;

use App\Application\Course\Actions\CreateCourse;
use App\Application\Course\Actions\GetAllCourses;
use App\Application\Course\Actions\GetCourseById;
use App\Application\Course\Actions\UpdateCourse;
use App\Application\Course\Resources\CourseResource;
use App\Entity\Course;
use App\Repository\CourseRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[Route('/courses')]
class CourseController extends AbstractController
{
    #[Route('/', name: "courses_list", methods: "GET")]
    public function courses(ManagerRegistry $doctrine): JsonResponse
    {
        try {
            $repository = new CourseRepository($doctrine);
            $action = new GetAllCourses($repository);

            $courses = $action->handle();

            $resultArray = [];

            foreach ($courses as $course) {
                array_push($resultArray, (new CourseResource($course))->toArray());
            };


            return new JsonResponse($resultArray);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/{id}', name: "courses_list_by_id", methods: "GET")]
    public function course(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        try {
            $repository = new CourseRepository($doctrine);
            $action = new GetCourseById($repository, $id);

            $courseArray = $action->handle();

            if (!$courseArray) throw new Exception("model not found");

            $course = $courseArray[0];
            $resource = new CourseResource($course);

            return new JsonResponse($resource->toArray());
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/', name: "courses_create", methods: "POST")]
    public function store(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        try {
            $params = $request->toArray();

            $repository = new CourseRepository($doctrine);

            $course = new Course();
            $course->setTitle($params['title']);
            $course->setDescription($params['description']);

            $startAt = new DateTime($params['start_at']);
            $course->setStartAt($startAt);

            $finishAt = new DateTime($params['finish_at']);
            $course->setFinishAt($finishAt);

            $action = new CreateCourse($repository, $course);
            $action->handle();

            return new JsonResponse(['resource created successfully'], 201);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/{id}', name: "courses_update", methods: "PATCH")]
    public function update(ManagerRegistry $doctrine, int $id, Request $request): JsonResponse
    {
        try {
            $params = $request->toArray();

            $repository = new CourseRepository($doctrine);
            $getByIdAction = new GetCourseById($repository, $id);

            $courseArray = $getByIdAction->handle();

            if (!isset($courseArray[0])) throw new Exception("model not found");

            $course = $courseArray[0];

            $course->setTitle($params['title']);
            $course->setDescription($params['description']);

            $startAt = new DateTime($params['start_at']);
            $course->setStartAt($startAt);

            $finishAt = new DateTime($params['finish_at']);
            $course->setFinishAt($finishAt);

            $updateAction = new UpdateCourse($repository, $course);
            $updateAction->handle();

            return new JsonResponse(['resource updated successfully'], 202);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }

    #[Route('/{id}', name: "courses_delete", methods: "DELETE")]
    public function delete(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        try {
            $repository = new CourseRepository($doctrine);
            $getByIdAction = new GetCourseById($repository, $id);

            $courseArray = $getByIdAction->handle();

            if (!isset($courseArray[0])) throw new Exception("model not found");

            $course = $courseArray[0];

            $course->setDeletedAt(new DateTime());

            $updateAction = new UpdateCourse($repository, $course);
            $updateAction->handle();

            return new JsonResponse(['resource deleted successfully'], 200);
        } catch (Exception $e) {
            return new JsonResponse(['Error' => $e->getMessage()], 400);
        }
    }
}
