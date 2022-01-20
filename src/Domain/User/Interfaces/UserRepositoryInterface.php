<?php

namespace App\Domain\User\Interfaces;

interface UserRepositoryInterface
{
    public function get(): array;
}