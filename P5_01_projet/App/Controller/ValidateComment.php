<?php


namespace App\Controller;


use App\Manager\CommentManager;

class ValidateComment extends Controller
{
    public function validateComment($idComment)
    {
        $this->checkIfUserIsAdmin();

        $manager = new CommentManager();
        $manager->validateComment($idComment);

        $this->addMessageFlash("Commentaire validé.", self::TYPE_FLASH_SUCCESS);
        $this->redirect('listCommentUnvalidate');
    }
}