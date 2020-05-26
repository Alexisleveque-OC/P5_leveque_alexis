<?php


namespace App\Controller;


abstract class Controller
{

    public function redirect($action, array $params = null)
    {
        header('Location: /index.php?action='.$action );
    }
}