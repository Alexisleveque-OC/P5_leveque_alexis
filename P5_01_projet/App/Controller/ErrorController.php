<?php


namespace App\Controller;


class ErrorController extends Controller
{
    public function displayError($errorMessage)
    {
        $this->render("Error" ,[
            'errorMessage' => $errorMessage
        ]);
    }
}