<?php


namespace App\Controller;


use App\Manager\CommentManager;
use App\Manager\UserManager;


abstract class Controller
{

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function redirect($action, array $params = null)

    {

        $baseUrl = "/index.php?action=" . $action;
        $queryParams = "";
        if ($params !== null) {
            foreach ($params as $key => $value) {
                $queryParams .= "&" . $key . "=" . $value;
            }
        }
        header('Location: ' . $baseUrl . $queryParams);
    }

    public function needLoad($file)
    {
        $userType = $this->userManager->searchTypeUser($_SESSION['user_name']);
        $commentCount = $this->commentManager->countCommentUnvalidate();
        return (__DIR__ . '/../View/' . $file . '.php');
    }
}