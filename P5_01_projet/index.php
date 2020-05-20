<?php

//use View;
use App\Entity;
use App\Controller\UserController;

require ('App/Autoloader.php');

App\Autoloader::register();


try
{
    if (isset($_GET['action'])) {
        if (($_GET['action']) == 'addUser'){
            if ($_POST['password'] === $_POST['password_confirmation']){
//                vérifier que le nom n'est pas déjà utiliser'

                $user = new UserController();
                $verif = $user->verifUser($_POST['user_name']);
                if ( $verif === false){
                    $user = new UserController();
                    $user->addUser(htmlspecialchars($_POST['user_name']),
                        htmlspecialchars($_POST['email']),
                        htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)));
                }
                else {
                    throw new Exception('Le nom que vous souhaitez existe déjà.');
                }
            }
            else{
                throw new Exception('Les mots de passes ne sont pas identiques.');
            }
        }
    }
    else{
        header ('Location: Public/View/Home.php');
    }

}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
    require('Public/View/Error.php');
}