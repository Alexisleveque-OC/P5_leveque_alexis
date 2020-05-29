<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;

class PostController extends Controller
{
    public function listOnce($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        $userManager = new UserManager();
        $user = $userManager->listInfoUser($post->getUserId());
        require __DIR__ . '/../View/Post.php';

    }
}