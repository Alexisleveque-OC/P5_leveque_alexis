<?php


namespace App\Controller;


use App\Entity\User;
use App\Manager\UserManager;

class SubscribeController extends  Controller
{
    public function subscribe()
    {
        $infoPost = $this->countInfoPost();
        if ($infoPost !== 0) {

            $user = new User();
            $user->setUserName(filter_input(INPUT_POST,'user_name'));
            $user->setPassword(filter_input(INPUT_POST,'password'));
            $user->setEmail(filter_input(INPUT_POST,'email'));
            $passwwordConfirmation = $_POST['password_confirmation'];

            $user->getErrors();
            $errors = $user->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }
            $manager = new UserManager();
            if ($user->getPassword() === $passwwordConfirmation) {
                $manager->verifUser($user);

                $data = $manager->addUser($user);
                $this->connectUser($user);
                $this->redirect('home');
            }
            throw new \Exception('Les mots de passes ne sont pas identiques.');
        }

        $this->render("Subscribe");
    }
}