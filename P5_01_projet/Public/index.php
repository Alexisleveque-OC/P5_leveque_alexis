<?php

//use View;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\PostController;
use App\Controller\ConnectionController;
use App\Controller\ErrorController;
use App\Controller\DestroyController;


require('../App/Autoloader.php');

App\Autoloader::register();


$action = $_GET['action'] ?? 'home';

try {

    switch ($action) {
        case 'home':
            (new HomeController())();
            break;
        case 'posts':
            (new PostController())();
            break;
        case 'connection':
            (new ConnectionController())();
            break;
        case 'logout':
            $destroy = new DestroyController();
            $destroy->destroy();
            break;
        case 'post':
            if (!isset($_GET['id'])) {
                throw  new \Exception('Erreur 404 ');
            }
            break;

        //$controller = new PostController();
        //$controller->show($_GET['id']);

        case 'subscribe':
            $controller = new UserController();
            $controller->subscribe();
            break;
    }


} catch (Exception $e) {
    (new ErrorController())();
    die($errorMessage = $e->getMessage());
}