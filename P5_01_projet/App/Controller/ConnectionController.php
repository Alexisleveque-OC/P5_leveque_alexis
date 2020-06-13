<?php


namespace App\Controller;

use App\Manager\UserManager;
use App\Service\ViewLoader;

class ConnectionController extends Controller
{
    public function connection()
    {
        if (count($_POST) !== 0) {
            $infos = self::refactorSupervariable($_POST);

            $manager = new UserManager();
            $user = $manager->verifPass($infos['user_name'], $infos['password']);
            $_SESSION['user_name'] = $user->getUserName();
            $_SESSION['id_user'] = $user->getIdUser();

            $this->redirect('home');
        }
        ViewLoader::render("Connection");
    }
}