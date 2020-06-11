<?php


namespace App\Controller;


use App\Service\ViewLoader;

class ErrorController extends Controller
{
    public function displayError($errorMessage)
    {
        ViewLoader::render("Error" ,[
            'errorMessage' => $errorMessage
        ]);
    }
}