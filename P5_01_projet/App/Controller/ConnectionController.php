<?php


namespace App\Controller;

use App\Manager\UserManager;
use App\Service\ViewLoader;

class ConnectionController extends Controller
{
    public function connection()
    {
        if (count($_POST) !== 0) {
            $manager = new UserManager();
            $data = $manager->verifPass($_POST['user_name'],$_POST['password']);
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['id_user'] = $data['id_user'];

            $this->redirect('home');
            }
        ViewLoader::render("Connection");
    }
}