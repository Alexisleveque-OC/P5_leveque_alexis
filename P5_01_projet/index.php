<?php

//use View;
use App\Entity;
use App\Controller;

require ('App/Autoloader.php');

App\Autoloader::register();


try
{
    if (isset($_GET['action'])) {
        if (($_GET['action']) == 'addUser'){
            if ($_POST['password'] === $_POST['password_confirmation']){
                $user = new App\Controller\UserController();
                $user->addUser(htmlspecialchars($_POST['user_name']),
                    htmlspecialchars($_POST['email']),
                    htmlspecialchars($_POST['password']));
            }
            else{
                throw new Exception('Les mots de passes ne sont pas identiques');
            }
        }
    }
    else{
        require_once('Public/View/Home.php');
    }

}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
    require('Public/View/Error.php');
}