<?php


namespace App\Controller;


class ErrorController extends Controller
{
    public function __invoke()
    {
        require $this->needLoad('Error');
    }
}