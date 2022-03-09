<?php

namespace Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function shouldSetAndGetUserEmail()
    {
        $user = new User();
        $user->setEmail('test@email.com');

        $this->assertEquals($user->getEmail(), 'test@email.com');
    }

    /**
     * @test
     */
    public function shouldIdentifierBeUserEmailField()
    {
        $user = new User();
        $user->setEmail('test@email.com');

        $this->assertEquals($user->getUserIdentifier(), 'test@email.com');
    }

    /**
     * @test
     */
    public function shouldEveryUserHasRoleUser()
    {
        $user = new User();

        $this->assertEquals($user->getRoles(), ['ROLE_USER']);
    }

    /**
     * @test
     */
    public function shouldSetAndGetUserRoles()
    {
        $user = new User();
        $user->setRoles(['EXAMPLE_ROLE']);

        $this->assertEquals($user->getRoles(), ['EXAMPLE_ROLE', 'ROLE_USER']);
    }

    /**
     * @test
     */
    public function shouldSetAndGetUserPassword()
    {
        $user = new User();
        $user->setPassword('123');

        $this->assertEquals($user->getPassword(), '123');
    }
}
