<?php

namespace Tests\Entity;

use App\Entity\Course;
use DateTime;
use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    /**
     * @test
     */
    public function shouldSetAndGetCourseTitle()
    {
        $course = new Course();
        $course->setTitle('Laravel course');

        $this->assertEquals($course->getTitle(), 'Laravel course');
    }

    /**
     * @test
     */
    public function shouldSetAngGetCourseDescription()
    {
        $course = new Course();
        $course->setDescription('Laravel course description');

        $this->assertEquals($course->getDescription(), 'Laravel course description');
    }

    /**
     * @test
     */
    public function shouldSetAndGetCourseStartAt()
    {
        $course = new Course();
        $startAt = new DateTime();

        $course->setStartAt($startAt);

        $this->assertEquals($course->getStartAt(), $startAt);
    }

    /**
     * @test
     */
    public function shouldSetAndGetCourseFinishAt()
    {
        $course = new Course();
        $finishAt = new DateTime();

        $course->setFinishAt($finishAt);

        $this->assertEquals($course->getFinishAt(), $finishAt);
    }
}
