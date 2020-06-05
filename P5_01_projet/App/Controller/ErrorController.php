<?php


namespace App\Controller;


class ErrorController extends Controller
{
    public function displayError($errorMessage)
    {

        require $this->needLoad('Error');
    }
}