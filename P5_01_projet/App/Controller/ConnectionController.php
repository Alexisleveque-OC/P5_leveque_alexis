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
            $this->connectUser($user);

            $this->redirect('home');
        }
        $this->render("Connection");
    }

}