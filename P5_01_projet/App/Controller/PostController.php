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

        $commentManager = new CommentManager();
        $comments = $commentManager->listComments($id);
        require __DIR__.'/../View/Post.php';
    }
}