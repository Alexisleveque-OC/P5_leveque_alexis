<?php


namespace App\Controller;


use App\Manager\PostsManager;

class PostController
{
    public function listOnce($id)
    {
        $manager = new PostsManager();
        $manager->listOnce($id);

    }
}