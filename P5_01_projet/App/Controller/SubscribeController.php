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
            $infos = self::refactorSupervariable($_POST);

            $user = new User();
            $user->setUserName($infos['user_name']);
            $user->setPassword($infos['password']);
            $user->setEmail($infos['email']);

            $user->getErrors();
            $errors = $user->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new UserManager();
            if ($infos['password'] === $infos['password_confirmation']) {
                $manager->verifUser($infos['user_name']);

                $data = $manager->addUser(
                    $infos['user_name'],
                    $infos['password'],
                    $infos['email'],
                    1
                );
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['id_user'] = $data['id_user'];
                $this->redirect('home');
            }
            throw new \Exception('Les mots de passes ne sont pas identiques.');
        }

        ViewLoader::render("Subscribe");
    }
}