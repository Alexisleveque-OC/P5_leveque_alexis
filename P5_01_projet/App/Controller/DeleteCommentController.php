<?php


namespace App\Controller;


use App\Manager\CommentManager;

class DeleteCommentController extends Controller
{
    public function deleteComment($idComment)
    {
        $this->checkIfUserIsAdmin();

        $manager = new CommentManager();
        $manager->deleteComment($idComment);

        $this->addMessageFlash("Commentaire suprimé.", self::TYPE_FLASH_ERROR);
        $this->redirect('listCommentUnvalidate');
    }

}