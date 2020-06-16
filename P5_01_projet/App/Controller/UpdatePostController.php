<?php


namespace App\Controller;


use App\Entity\Post;
use App\Manager\PostsManager;

class UpdatePostController extends Controller
{
    public function updatePost($idPost)
    {
//        $infos = self::refactorSupervariable($_POST);


        $manager = new PostsManager();
        $post = $manager->listOnce($idPost);


        if (count($_POST) !== 0) {
            $post = new Post();
            $post->setIdPost(filter_input(INPUT_GET,'id'));
            $post->setTitle(filter_input(INPUT_POST,'title'));
            $post->setChapo(filter_input(INPUT_POST,'chapo'));
            $post->setContent(filter_input(INPUT_POST,'content'));
            $post->setUserId($_SESSION['id_user']);

            $errors = $post->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }

            $manager = new PostsManager();
            $manager->updatePost(
                $post
            );
            $this->addMessageFlash("L'article a bien été modifié",self::TYPE_FLASH_INFO);
            $this->redirect('post&id='.$_GET['id']);
        }
        $this->render("PostUpdate", [
                'post' => $post
            ]);
    }
}