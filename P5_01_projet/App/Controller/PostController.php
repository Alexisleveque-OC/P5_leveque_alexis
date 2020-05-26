<?php


namespace App\Controller;


use App\Manager\PostsManager;

class PostController extends Controller
{
    public function listOnce($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        require __DIR__ . '/../View/Post.php';

    }
}