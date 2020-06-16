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


        if (count($_POST) === 1) {
//            $infos = self::refactorSupervariable($_POST);
//            $infosSession = self::refactorSupervariable($_SESSION);
            $comment = new Comment();
            $comment->setContent(filter_input(INPUT_POST,'content'));
            $comment->setUserId($this->getUserConnected()->getIdUser());
            $comment->setPostId($idPost);
            $comment->getErrors();
            $errors = $comment->getErrors();

            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new CommentManager();
            $manager->addComment(
                $comment
            );
            $this->redirect("post", ["id" => $idPost]);
        }
        throw new \Exception('Tous les champ ne sont pas remplis');

    }
}