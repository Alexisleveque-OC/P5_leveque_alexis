<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Service\ViewLoader;

class UpdatePostController extends Controller
{
    public function updatePost($idPost)
    {
        $infos = self::refactorSupervariable($_POST);
//        $infosSession = self::refactorSupervariable($_SESSION);

        $manager = new PostsManager();
        $post = $manager->listOnce($idPost);
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
        $this->render("PostUpdate", [
                'post' => $post
            ]);
    }
}