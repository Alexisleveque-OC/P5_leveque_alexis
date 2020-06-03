<?php


namespace App\Controller;


use App\Manager\CommentManager;

class CountCommentController extends Controller
{
    public function countComment()
    {
        $manager = new CommentManager();
        $commentCount = $manager->countComment();
        $_SESSION['commentCount'] = $commentCount;
        return $commentCount;
    }
}