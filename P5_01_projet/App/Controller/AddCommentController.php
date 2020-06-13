<?php


namespace App\Controller;


use App\Entity\Comment;
use App\Manager\CommentManager;

class AddCommentController extends Controller
{
    public function addComment($id)
    {
        if (count($_POST) === 1) {
            $infos = self::refactorSupervariable($_POST);
            $comment = new Comment();
            $comment->setContent($infos['content']);

            $comment->getErrors();
            $errors = $comment->getErrors();

            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new CommentManager();
            $manager->addComment(
                $_POST['content'],
                $_SESSION['id_user'],
                $id
            );
            $this->redirect("post", ["id" => $id]);
        }
        throw new \Exception('Tous les champ ne sont pas remplis');

    }
}