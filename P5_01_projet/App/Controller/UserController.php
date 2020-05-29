<?php


namespace App\Controller;


use App\Manager\UserManager;

class UserController extends Controller
{
    public function listInfoUser($name)
    {
        $manager = new UserManager();
        $user = $manager->listInfoUser($name);
        return $user;
    }
}