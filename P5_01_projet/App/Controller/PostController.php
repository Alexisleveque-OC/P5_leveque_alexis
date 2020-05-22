<?php


namespace App\Controller;


class PostController
{
    public function __invoke()
    {
        require __DIR__ . '/../View/Posts.php';
    }
}