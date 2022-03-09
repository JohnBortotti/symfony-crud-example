<?php

namespace App\Domain\Registration\Interfaces;

interface RegistrationResourceableInterface
{
    public function getId();
    public function getCourse();
    public function getStudent();
    public function getUser();
    public function getDate();
}
