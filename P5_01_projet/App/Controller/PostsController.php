<?php


namespace App\Controller;


class PostsController
{
    public function __invoke()
    {
        require __DIR__ . '/../View/Posts.php';
    }
}