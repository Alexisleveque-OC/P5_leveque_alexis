<?php


namespace App\Controller;


use App\Manager\CommentManager;

class DeleteCommentController extends Controller
{
    public function deleteComment($idComment)
    {
        $manager = new CommentManager();
        $manager->deleteComment($idComment);
        $this->redirect('listCommentUnvalidate');
    }

}