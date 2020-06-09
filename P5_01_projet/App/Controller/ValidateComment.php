<?php


namespace App\Controller;


use App\Manager\CommentManager;

class ValidateComment extends Controller
{
    public function validateComment($id)
    {
        $manager = new CommentManager();
        $manager->validateComment($id);
        $this->redirect('listCommentUnvalidate');
    }
}