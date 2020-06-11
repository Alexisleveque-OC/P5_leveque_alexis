<?php


namespace App\Controller;


use App\Manager\CommentManager;

class DeleteCommentController extends Controller
{
    public function deleteComment($id)
    {
        $manager = new CommentManager();
        $manager->deleteComment($id);
        $this->redirect('listCommentUnvalidate');
    }

}