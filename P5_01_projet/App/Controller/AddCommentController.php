<?php


namespace App\Controller;


use App\Entity\Comment;
use App\Manager\CommentManager;

class AddCommentController extends Controller
{
    public function addComment($idPost)
    {
        if (count($_POST) === 1) {
            $infos = self::refactorSupervariable($_POST);
            $infosSession = self::refactorSupervariable($_SESSION);
            $comment = new Comment();
            $comment->setContent($infos['content']);

            $comment->getErrors();
            $errors = $comment->getErrors();

            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new CommentManager();
            $manager->addComment(
                $infos['content'],
                $infosSession['id_user'],
                $idPost
            );
            $this->redirect("post", ["id" => $idPost]);
        }
        throw new \Exception('Tous les champ ne sont pas remplis');

    }
}