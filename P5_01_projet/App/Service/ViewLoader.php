<?php

namespace App\Service;

use App\Entity\User;
use App\Manager\CommentManager;
use App\Manager\UserManager;


class ViewLoader
{


    public static function escape($htmlForEscape)
    {
        $html = htmlspecialchars($htmlForEscape);
        return $html;
    }

    static public function render($path, $params = null)
    {

        if ($params !== null) {
            extract($params);
        }

        $nbCommentUnvalidate = (new CommentManager())->countCommentUnvalidate();

        if (isset ($_SESSION['user_name'])) {
            $userConnection = new User();
            $userConnection->setUserName($_SESSION['user_name']);
            $userConnection->setIdUser($_SESSION['user_name']);
            $userConnected = (new UserManager())-> searchInfoUser($userConnection->getUserName());
        }
        ob_start();
        require __DIR__ . "/../View/" . $path . ".php";

        $content = ob_get_clean();

        require_once(__DIR__ . '/../View/Template.php');
    }

}