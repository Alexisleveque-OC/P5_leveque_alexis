<?php


namespace App\Controller;


use App\Manager\CommentManager;

class CountCommentController extends Controller
{
    public function countCommentUnvalidate()
    {
        $manager = new CommentManager();
        $commentCount = $manager->countCommentUnvalidate();
        $_SESSION['commentCount'] = $commentCount;
        return $commentCount;
    }
}