<?php
require_once ('../vendor/autoload.php');

session_start();
use App\Controller\HomeController;
use App\Controller\SubscribeController;
use App\Controller\PostsController;
use App\Controller\PostController;
use App\Controller\ConnectionController;
use App\Controller\ErrorController;
use App\Controller\DestroyController;
use App\Controller\CreatePostController;




$action = $_GET['action'] ?? 'home';

try {

    switch ($action) {
        case 'home':
            (new HomeController())();
            break;
        case 'posts':
            (new PostsController())();
            break;
        case 'connection':
            $controller = new ConnectionController();
            $controller->connection();
            break;
        case 'logout':
            $controller = new DestroyController();
            $controller->destroy();
            break;
        case 'createPost':
            $controller = new CreatePostController ();
            $controller->addPost();
            break;
        case 'post':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new PostController();
            $controller->listOnce($_GET['id']);
            break;
        case 'subscribe':
            $controller = new SubscribeController();
            $controller->subscribe();
            break;
    }


} catch (Exception $e) {
    (new ErrorController())();
    die($errorMessage = $e->getMessage());
}