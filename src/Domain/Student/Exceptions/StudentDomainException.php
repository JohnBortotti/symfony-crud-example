<?php

namespace App\Domain\Student\Exceptions;

use Exception;
use Throwable;

class StudentDomainException extends Exception
{
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
