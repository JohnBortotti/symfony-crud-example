<?php

namespace Tests\Entity;

use App\Domain\Student\Exceptions\StudentDomainException;
use App\Entity\Student;
use DateTime;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    /**
     * @test
     */
    public function shouldSetAndGetStudentName()
    {
        $student = new Student();
        $student->setName('João');

        $this->assertEquals($student->getName(), 'João');
    }

    /**
     * @test
     */
    public function shouldSetAndGetStudentEmail()
    {
        $student = new Student();
        $student->setEmail('joao@test.com');

        $this->assertEquals($student->getEmail(), 'joao@test.com');
    }

    /**
     * @test
     */
    public function shouldSetAndGetStudentBirthdate()
    {
        $student = new Student();
        $birthDate = new DateTime('2002-01-15');

        $student->setBirthdate($birthDate);

        $birthDate = $student->getBirthdate();

        $this->assertInstanceOf(DateTime::class, $birthDate);
        $this->assertEquals($birthDate->format('Y-m-d'), '2002-01-15');
    }

    /**
     * @test
     */
    public function shouldThrowDomainExceptionWhenStudentIsYoungerThan16()
    {
        $this->expectException(StudentDomainException::class);

        $student = new Student();
        $birthDate = new DateTime();

        $student->setBirthdate($birthDate);
    }

    /**
     * @test
     */
    public function shouldSetAndGetStudentDeletedAt()
    {
        $student = new Student();
        $deleted_at = new DateTime('2002-02-15');

        $student->setDeletedAt($deleted_at);

        $deleted_at = $student->getDeletedAt();

        $this->assertInstanceOf(DateTime::class, $deleted_at);
        $this->assertEquals($deleted_at->format('Y-m-d'), '2002-02-15');
    }
}
