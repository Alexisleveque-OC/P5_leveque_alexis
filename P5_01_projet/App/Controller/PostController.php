<?php


namespace App\Controller;


use App\Manager\CommentManager;
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
        $commentManager = new CommentManager();
        $comments = $commentManager->listComments($id);
        $this->needLoad('Post');
    }
}