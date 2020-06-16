<?php

namespace App\Service;

use App\Entity\User;
use App\Manager\CommentManager;
use App\Manager\UserManager;


class ViewLoader
{



    static public function render($path, $params = null)
    {

        if ($params !== null) {
            extract($params);
        }

        $nbCommentUnvalidate = (new CommentManager())->countCommentUnvalidate();

        if (isset ($_SESSION['user_name'])) {
            $userConnecte = new User();
            $userConnecte->setUserName($_SESSION['user_name']);
            $userConnecte->setIdUser($_SESSION['user_name']);
            $userConnected = (new UserManager())-> searchInfoUser($userConnecte->getUserName());
        }
        ob_start();
        require __DIR__ . "/../View/" . $path . ".php";

        $content = ob_get_clean();

        require_once(__DIR__ . '/../View/Template.php');
    }

}