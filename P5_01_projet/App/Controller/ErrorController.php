<?php


namespace App\Controller;


class ErrorController
{
    public function __invoke()
    {

        require __DIR__ . '/../View/Error.php';
    }
}