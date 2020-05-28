<?php


namespace App\Controller;


use App\Manager\PostsManager;

class DeleteController extends Controller
{
    public function deletePost($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        require __DIR__ . '/../View/Delete.php';
        if (isset($_POST['yes']))
        {
            $manager = new PostsManager();
            $deletedPost = $manager->deletePost($id);
            $this->redirect('posts');
        }
        elseif (isset($_POST['no']))
        {
            $this->redirect('posts');
        }
    }
}