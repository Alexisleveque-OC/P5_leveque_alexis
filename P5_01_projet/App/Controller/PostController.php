<?php


namespace App\Controller;


use App\Manager\CommentManager;
use App\Manager\PostsManager;

class PostController extends Controller
{
    public function listOnce($idPost)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($idPost);

        $commentManager = new CommentManager();
        $count = $commentManager->countCommentPost($idPost) ;
        $comments = $commentManager->listComments($idPost ,10 , $_GET['page'] ?? 1);
        $this->render("Post", [
            'post' => $post,
            'count' => $count,
            'comments' => $comments
        ]);
    }
}