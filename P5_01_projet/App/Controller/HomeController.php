<?php


namespace App\Controller;


use App\Manager\UserManager;

class HomeController extends Controller
{
    public function __invoke()
    {
        require __DIR__.'/../View/Home.php';
    }
}