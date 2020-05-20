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

    public function searchUser($name){
        $user = new UserManager();
        $user->searchUser($name);
        var_dump($user);
        return $user;


    }


}