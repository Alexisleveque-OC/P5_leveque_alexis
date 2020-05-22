<?php


namespace App\Controller;

use App\Manager\UserManager;

class ConnectionController
{

    public function connection()
    {
        if (count($_POST) !== 0) {
            $manager = new UserManager();
            $manager->verifPass($_POST['user_name'],$_POST['password']);

            $_SESSION['user_name'] = $_POST['user_name'];
                require_once ('../Public/index.php');
            }

        require __DIR__ . '/../View/Connection.php';
    }
}