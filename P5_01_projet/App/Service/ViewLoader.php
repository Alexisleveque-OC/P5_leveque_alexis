<?php

namespace App\Service;

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
            $userType = (new UserManager())->searchUserType($_SESSION['user_name']);
        }
        ob_start();
        require __DIR__ . "/../View/" . $path . ".php";

        $content = ob_get_clean();

        require_once(__DIR__ . '/../View/Template.php');
    }

}