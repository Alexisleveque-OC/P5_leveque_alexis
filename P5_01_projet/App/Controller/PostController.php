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
        $count = $commentManager->countCommentPost($id) ;
        $comments = $commentManager->listComments($id ,10 , $_GET['page'] ?? 1);
        require $this->needLoad('Post');
    }
}