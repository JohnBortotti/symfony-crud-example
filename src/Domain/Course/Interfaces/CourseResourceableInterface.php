<?php

namespace App\Domain\Course\Interfaces;

interface CourseResourceableInterface
{
    public function getId();
    public function getTitle();
    public function getDescription();
    public function getStartAt();
    public function getFinishAt();
}
