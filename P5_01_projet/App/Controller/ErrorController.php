<?php


namespace App\Controller;


use App\Service\ViewLoader;

class ErrorController extends Controller
{
    public function __invoke()
    {
        ViewLoader::render("Error");
    }
}