<?php


namespace App\Controller;


class ErrorController extends Controller
{
    public function __invoke()
    {

        require __DIR__ . '/../View/Error.php';
    }
}