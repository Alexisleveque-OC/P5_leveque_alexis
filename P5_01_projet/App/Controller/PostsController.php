<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Entity\Post;

class PostsController
{
    public function __invoke()
    {
        $manager = new PostsManager();
        $posts= $manager->listAllPosts();
        require __DIR__ . '/../View/Posts.php';
    }

}