<?php


namespace App\Controller;


use App\Service\ViewLoader;

class ErrorController extends Controller
{
    public function displayError($errorMessage)
    {
        $this->render("Error" ,[
            'errorMessage' => $errorMessage
        ]);
    }
}