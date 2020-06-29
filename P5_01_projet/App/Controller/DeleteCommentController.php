<?php


namespace App\Controller;


use App\Manager\CommentManager;

class DeleteCommentController extends Controller
{
    public function deleteComment($idComment, $idPost = null)
    {
        $this->checkIfUserIsAdmin();

        $manager = new CommentManager();
        $manager->deleteComment($idComment);

        $this->addMessageFlash("Commentaire supprimé.", self::TYPE_FLASH_ERROR);

        if (isset($idPost))
        {
            $this->redirect("post", ["id" => $idPost]);
        }
        $this->redirect('listCommentUnvalidate');
    }

}