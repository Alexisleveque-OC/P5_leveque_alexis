<?php


namespace App\Controller;


abstract class Controller
{

    public function redirect($action, array $params = null)

    {

        $baseUrl = "/index.php?action=".$action;

        $queryParams ="";
        foreach ($params as $key => $value){
            $queryParams .= "&".$key."=".$value;
        }

        header('Location: '. $baseUrl.$queryParams);
    }

    public function needLoad($file)
    {

        require __DIR__ . '/../View/'.$file.'.php';
    }
}