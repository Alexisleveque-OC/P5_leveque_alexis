<?php


namespace App\Controller;


use App\Manager\CommentManager;

abstract class Controller
{

    public function __construct()
    {
        $this->commentManager = new CommentManager();
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

        $commentCount = $this->commentManager->countCommentUnvalidate();
        return (__DIR__ . '/../View/' . $file . '.php');
    }
}