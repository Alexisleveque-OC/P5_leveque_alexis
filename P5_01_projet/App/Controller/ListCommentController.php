<?php


namespace App\Controller;


use App\Manager\CommentManager;

class ListCommentController extends Controller
{
    public function listCommentsUnvalidate()
    {
        $manager = new CommentManager();
        $comments = $manager->listCommentsUnvalidate();
        require __DIR__ . '/../View/listCommentUnvalidate.php';
    }
}