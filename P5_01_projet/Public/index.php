<?php

//use View;
use App\Controller\HomeController;
use App\Controller\UserController;

require('../App/Autoloader.php');

App\Autoloader::register();


$action = $_GET['action'] ?? 'home';

try {

    switch ($action) {
        case 'home':
            (new HomeController())();
            break;
        case 'posts':
            break;
        case 'post':
            if(!isset($_GET['id'])){
                throw  new \Exception('Erreur 404 ');
            }

            //$controller = new PostController();
            //$controller->show($_GET['id']);

        case 'subscribe':
            $controller = new UserController();
            $controller->subscribe();
            break;
    }


} catch (Exception $e) {
    die($errorMessage = $e->getMessage());
    // TODO creer un ErrorController
}