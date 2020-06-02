<?php


namespace App\Controller;

use App\Manager\PostsManager;

class CreatePostController extends Controller
{
    public function addPost()
    {
        if (count($_POST) !== 0) {
            $manager = new PostsManager();
            $manager->addPost(
                $_POST['title'],
                $_POST['chapo'],
                $_POST['content'],
                $_SESSION['id_user']
            );
            $this->redirect('posts');
        }
        $this->needLoad('PostCreation');
    }
}