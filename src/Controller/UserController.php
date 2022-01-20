<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users")
 */
class UserController
{
    /**
     * @Route("/", name="users_list")
     */
    public function users(): Response
    {
        return new Response('<html><body>Hello Worldo</body></html>');
    }
}
