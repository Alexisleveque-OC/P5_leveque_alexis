<?php


namespace App\Controller;


class ErrorController extends Controller
{
    public function __invoke()
    {
        $this->needLoad('Error');
    }
}