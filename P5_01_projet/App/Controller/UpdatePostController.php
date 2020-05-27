<?php


namespace App\Controller;


use App\Manager\PostsManager;

class UpdatePostController extends Controller
{
    public function updatePost($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        if (count($_POST) !== 0) {
            $manager = new PostsManager();
            $manager->updatePost(
                $_GET['id'],
                $_POST['title'],
                $_POST['chapo'],
                $_POST['content'],
                $_SESSION['id_user']
            );
            $this->redirect('post&id='.$_GET['id']);
        }
        require __DIR__ . '/../View/PostUpdate.php';
    }
}