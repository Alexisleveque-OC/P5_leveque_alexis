<?php

namespace App\Service;

use App\Manager\CommentManager;

class ViewLoader
{


    static public function render($path, $params = null)
    {

        if ($params !== null) {
            extract($params);
        }

        $commentCount = (new CommentManager())->countCommentUnvalidate();
        ob_start();
        require __DIR__ . "/../View/" . $path . ".php";

        $content = ob_get_clean();

        require_once(__DIR__ . '/../View/Template.php');
    }

}