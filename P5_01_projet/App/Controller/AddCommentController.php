<?php


namespace App\Controller;


use App\Entity\Comment;
use App\Manager\CommentManager;

class AddCommentController extends Controller
{
    /**
     * @param $idPost
     * @throws \Exception
     */
    public function addComment($idPost)
    {
        $this->checkIfUserIsConnected();

        $infoPost = $this->countInfoPost();
        if ($infoPost === 1) {
            $comment = new Comment();
            $comment->setContent(filter_input(INPUT_POST,'content'));
            $comment->setUserId($this->getUserConnected()->getIdUser());
            $comment->setPostId($idPost);
            $errors = $comment->getErrors();

            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new CommentManager();
            $manager->addComment(
                $comment
            );

            $this->addMessageFlash("Commentaire envoyé. En attente de validation.",self::TYPE_FLASH_INFO);
            $this->redirect("post", ["id" => $comment->getPostId()]);
        }
    }
}