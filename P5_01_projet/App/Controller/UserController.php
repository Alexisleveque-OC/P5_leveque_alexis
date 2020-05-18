<?php


namespace App\Controller;


use App\Manager\UserManager;

class UserController
{
    public function addUser($name,$password,$email, $user_type_id = 1)
    {
        $user = new UserManager();
        $user->AddUser($name,$password,$email,$user_type_id);

        header ('Location: index.php' );

    }


}