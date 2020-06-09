<?php


namespace App\Controller;


use App\Entity\User;
use App\Manager\UserManager;
use App\Service\ViewLoader;

class SubscribeController extends  Controller
{
    public function subscribe()
    {
        if (count($_POST) !== 0) {
            $user = new User();
            $user->setUserName($_POST['user_name']);
            $user->setPassword($_POST['password']);
            $user->setEmail($_POST['email']);

            $user->getErrors();
            $errors = $user->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new UserManager();
            if ($_POST['password'] === $_POST['password_confirmation']) {
                $manager->verifUser($_POST['user_name']);

                $data = $manager->addUser(
                    $_POST['user_name'],
                    $_POST['password'],
                    $_POST['email'],
                    1
                );
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['id_user'] = $data['id_user'];
                $this->redirect('home');
            } else {
                throw new \Exception('Les mots de passes ne sont pas identiques.');
            }
        }

        ViewLoader::render("Subscribe");
    }
}