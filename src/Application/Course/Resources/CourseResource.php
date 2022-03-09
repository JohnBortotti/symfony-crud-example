<?php

namespace App\Application\Course\Resources;

use App\Domain\Course\Interfaces\CourseResourceableInterface;

class CourseResource
{
    public function __construct(private CourseResourceableInterface $course)
    {
    }

    public function toArray()
    {
        return [
            'id' => $this->course->getId(),
            'title' => $this->course->getTitle(),
            'description' => $this->course->getDescription(),
            'start_at' => $this->course->getStartAt(),
            'finish_at' => $this->course->getFinishAt(),
        ];
    }
}
