<?php
require_once('../vendor/autoload.php');
require_once('../App/config.local.php');

session_start();

use App\Controller\AddCommentController;
use App\Controller\ConnectionController;
use App\Controller\CountCommentController;
use App\Controller\CreatePostController;
use App\Controller\DeleteCommentController;
use App\Controller\DeletePostController;
use App\Controller\DestroyController;
use App\Controller\ErrorController;
use App\Controller\HomeController;
use App\Controller\ListCommentController;
use App\Controller\MailSendController;
use App\Controller\PostController;
use App\Controller\PostsController;
use App\Controller\SubscribeController;
use App\Controller\UpdatePostController;
use App\Controller\UserController;
use App\Controller\ValidateComment;


$action = filter_input(INPUT_GET, 'action') ?? 'home';
if (isset($_GET['id'])) {
    $idGet = filter_input(INPUT_GET, 'id');
}

try {
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
            if (!isset($idGet)) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new PostController();
            $controller->listOnce($idGet);
            break;
        case 'deletePost':
            if (!isset($idGet)) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new DeletePostController();
            $controller->deletePost($idGet);
            break;
        case 'createPost':
            $controller = new CreatePostController ();
            $controller->addPost();
            break;
        case 'updatePost':
            if (!isset($idGet)) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new UpdatePostController();
            $controller->updatePost($idGet);
            break;
        case 'addComment':
            if (!isset($idGet)) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new AddCommentcontroller();
            $controller->addComment($idGet);
            break;
        case 'deleteComment':
            if (!isset($idGet)) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new DeleteCommentController();
            $controller->deleteComment($idGet);
            break;
        case 'listCommentUnvalidate':
            $controller = new ListCommentController();
            $controller->listCommentsUnvalidate();
            break;
        case 'validateComment':
            if (!isset($idGet)) {
                throw  new Exception('Erreur 404 ');
            }
            $controller = new ValidateComment();
            $controller->validateComment($idGet);
            break;
        case 'mailSend':
        {
            (new MailSendController())();
            break;
        }
    }

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    $controller = new ErrorController();
    $controller->displayError($errorMessage);

}