<?php

namespace App\Domain\Student\Interfaces;

interface StudentResourceableInterface
{
    public function getId();
    public function getName();
    public function getEmail();
    public function getBirthDate();
}
