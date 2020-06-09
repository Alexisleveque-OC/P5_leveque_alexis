<?php


namespace App\Controller;


use App\Manager\CommentManager;
use App\Service\ViewLoader;

class ListCommentController extends Controller
{
    public function listCommentsUnvalidate()
    {
        $manager = new CommentManager();
        $comments = $manager->listCommentsUnvalidate();
        ViewLoader::render("ListCommentUnvalidate", [
            'comments' => $comments
        ]);
    }
}