<?php


namespace App\Controller;


use App\Manager\CommentManager;

class AddCommentController extends Controller
{
    public function addComment($id)
    {
        if (count($_POST) === 1)
        {
            $manager = new CommentManager();
            $manager->addComment(
                $_POST['content'],
                $_SESSION['id_user'],
                $_GET['id']
            );
            $this->redirect('post&id='.$_GET['id']);
        }
        else {
            throw new \Exception('Tous les champ ne sont pas remplis');
        }

    }
}