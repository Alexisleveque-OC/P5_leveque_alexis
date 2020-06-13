<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Service\ViewLoader;

class DeletePostController extends Controller
{
    public function deletePost($id)
    {
        $infos = self::refactorSupervariable($_POST);
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        ViewLoader::render("Delete", [
            'post' => $post
        ]);
        if (isset($infos['yes'])) {
            $manager = new PostsManager();
            $deletedPost = $manager->deletePost($id);
            $this->redirect('posts');
        } elseif (isset($infos['no'])) {
            $this->redirect('posts');
        }
    }
}