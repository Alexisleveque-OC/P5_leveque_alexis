<?php


namespace App\Controller;


use App\Manager\UserManager;

class UserController
{
    public function subscribe()
    {
        if (count($_POST) !== 0) {
            $manager = new UserManager();
            if ($_POST['password'] === $_POST['password_confirmation']) {
                $manager->verifUser($_POST['user_name']);

                $manager->addUser(
                    $_POST['user_name'],
                    $_POST['password'],
                    $_POST['email'],
                    1
                );
                $_SESSION['user_name'] = $_POST['user_name'];

                header('Location: index.php');
            } else {
                throw new \Exception('Les mots de passes ne sont pas identiques.');
            }
        }

        require __DIR__ . '/../View/Subscribe.php';
    }
}