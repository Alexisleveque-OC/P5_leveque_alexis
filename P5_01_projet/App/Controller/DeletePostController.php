<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Service\ViewLoader;

class DeletePostController extends Controller
{
    public function deletePost($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        ViewLoader::render("Delete", [
            'post' => $post
        ]);
        if (isset($_POST['yes'])) {
            $manager = new PostsManager();
            $deletedPost = $manager->deletePost($id);
            $this->redirect('posts');
        } elseif (isset($_POST['no'])) {
            $this->redirect('posts');
        }
    }
}