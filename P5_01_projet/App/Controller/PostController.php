<?php


namespace App\Controller;


use App\Entity\Post;
use App\Manager\CommentManager;
use App\Manager\PostsManager;

class PostController extends Controller
{
    public function listOnce($idPost)
    {
        $post = new Post();
        $post->setIdPost($idPost);

        $manager = new PostsManager();
        $post = $manager->listOnce($post->getIdPost());

        $commentManager = new CommentManager();
        $count = $commentManager->countCommentPost($post->getIdPost()) ;
        $comments = $commentManager->listComments($post->getIdPost() ,10 , filter_input(INPUT_GET,'page') ?? 1);
        $this->render("Post", [
            'post' => $post,
            'count' => $count,
            'comments' => $comments
        ]);
    }
}