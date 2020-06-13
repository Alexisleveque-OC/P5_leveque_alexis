<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Service\ViewLoader;

class UpdatePostController extends Controller
{
    public function updatePost($id)
    {
        $infos = self::refactorSupervariable($_POST);
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        if (count($_POST) !== 0 && is_int($_GET['id'])) {
            $manager = new PostsManager();
            $manager->updatePost(
                $_GET['id'],
                $infos['title'],
                $infos['chapo'],
                $infos['content'],
                $_SESSION['id_user']
            );
            $this->redirect('post&id='.$_GET['id']);
        }
        ViewLoader::render("PostUpdate", [
                'post' => $post
            ]);
    }
}