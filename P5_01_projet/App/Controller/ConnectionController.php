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
            $user = $manager->verifPass($_POST['user_name'], $_POST['password']);
            $_SESSION['user_name'] = $user->getUserName();
            $_SESSION['id_user'] = $user->getIdUser();

            $this->redirect('home');
        }
        ViewLoader::render("Connection");
    }
}