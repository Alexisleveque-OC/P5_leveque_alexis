<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Service\ViewLoader;

class DeletePostController extends Controller
{
    public function deletePost($idPost)
    {
        $infos = self::refactorSupervariable($_POST);
        $manager = new PostsManager();
        $post = $manager->listOnce($idPost);
        $this->render("Delete", [
            'post' => $post
        ]);
        if (isset($infos['yes'])) {
            $manager = new PostsManager();
            $deletedPost = $manager->deletePost($idPost);
            $this->redirect('posts');
        } elseif (isset($infos['no'])) {
            $this->redirect('posts');
        }
    }
}