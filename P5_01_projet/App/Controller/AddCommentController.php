<?php


namespace App\Controller;


class AddCommentController extends Controller
{
    public function addComment($id)
    {
        if (count($_POST) !== 0)
        {
            $manager = new CommentManager();

        }
    }
}