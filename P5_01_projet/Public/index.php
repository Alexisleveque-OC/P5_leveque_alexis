<?php
require_once ('../vendor/autoload.php');

session_start();

use App\Controller\AddCommentController;
use App\Controller\CountCommentController;
use App\Controller\DeleteCommentController;
use App\Controller\DeleteController;
use App\Controller\HomeController;
use App\Controller\ListCommentController;
use App\Controller\SubscribeController;
use App\Controller\PostsController;
use App\Controller\PostController;
use App\Controller\ConnectionController;
use App\Controller\ErrorController;
use App\Controller\DestroyController;
use App\Controller\CreatePostController;
use App\Controller\UpdatePostController;
use App\Controller\UserController;
use App\Controller\ValidateComment;


$action = $_GET['action'] ?? 'home';

try {
    if (isset($_SESSION['user_name']))
    {
        $controller = new UserController();
        $user = $controller->listInfoUser($_SESSION['user_name']);
    }

    $controller = new CountCommentcontroller();
    $commentCount = $controller->countComment();


    switch ($action) {
        case 'home':
            (new HomeController())();
            break;
        case 'connection':
            $controller = new ConnectionController();
            $controller->connection();
            break;
        case 'logout':
            $controller = new DestroyController();
            $controller->destroy();
            break;
        case 'subscribe':
            $controller = new SubscribeController();
            $controller->subscribe();
            break;
        case 'posts':
            (new PostsController())();
            break;
        case 'post':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new PostController();
            $controller->listOnce($_GET['id']);
            break;
        case 'deletePost':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new DeleteController();
            $controller->deletePost($_GET['id']);
            break;
        case 'createPost':
            $controller = new CreatePostController ();
            $controller->addPost();
            break;
        case 'updatePost':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new UpdatePostController();
            $controller->updatePost($_GET['id']);
            break;
        case 'addComment':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new AddCommentcontroller();
            $controller->addComment($_GET['id']);
            break;
        case 'deleteComment':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new DeleteCommentController();
            $controller->deleteComment($_GET['id']);
            break;
        case 'listComment':
            $controller= new ListCommentController();
            $controller->listCommentsUnvalidate();
            break;
        case 'validateComment':
            if (!isset($_GET['id'])) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new ValidateComment();
            $controller->validateComment($_GET['id']);
            break;

    }


}
catch (Exception $e) {
    $errorMessage = $e ->getMessage();
    require('../App/View/Error.php');
//    (new ErrorController())();

}