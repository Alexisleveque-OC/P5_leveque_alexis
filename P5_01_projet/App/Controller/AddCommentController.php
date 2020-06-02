<?php


namespace App\Controller;


use App\Entity\CheckValidityInterface;
use App\Entity\Comment;
use App\Manager\CommentManager;

class AddCommentController extends Controller
{
    public function addComment($id)
    {
        if (count($_POST) === 1) {
            $comment = new Comment();
            $comment->hydrate($_POST);

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
        } else {
            throw new \Exception('Tous les champ ne sont pas remplis');
        }
    }
}