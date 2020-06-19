<?php


namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;

class ConnectionController extends Controller
{
    public function connection()
    {
        $infoPost = $this->countInfoPost();
        if ($infoPost !== 0) {
            $user = new User();
            $user->setUserName(filter_input(INPUT_POST,'user_name'));
            $user->setPassword(filter_input(INPUT_POST,'password'));

            $manager = new UserManager();
            $user = $manager->verifPass($user->getUserName(), $user->getPassword());
            $this->connectUser($user);

            $this->redirect('home');
        }
        $this->render("Connection");
    }

}