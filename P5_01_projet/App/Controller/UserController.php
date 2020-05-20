<?php


namespace App\Controller;


use App\Manager\UserManager;

class UserController
{
    public function addUser($name,$password,$email, $user_type_id = 1)
    {
        $user = new UserManager();
        $user->AddUser($name,$password,$email,$user_type_id);
        $_SESSION['user_name'] = $name;

        header ('Location: index.php' );

    }

    public function verifUser($name){
        $user = new UserManager();
        $verif = $user->verifUser($name);
        return false;
    }


}