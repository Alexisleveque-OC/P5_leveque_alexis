<?php


namespace App\Controller;


class ErrorController
{
    public function __invoke()
    {
        return
        require __DIR__ . '/../View/Error.php';
    }
}