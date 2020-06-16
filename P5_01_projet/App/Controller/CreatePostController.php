<?php


namespace App\Controller;

use App\Entity\Post;
use App\Manager\PostsManager;

class CreatePostController extends Controller
{
    public function addPost()
    {
        if (count($_POST) !== 0) {
            $post = new Post();
            $post->setTitle(filter_input(INPUT_POST,'title'));
            $post->setChapo(filter_input(INPUT_POST,'chapo'));
            $post->setContent(filter_input(INPUT_POST,'content'));
            $post->setUserId($_SESSION['id_user']);

            $post->getErrors();
            $errors = $post->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }
            $manager = new PostsManager();
            $manager->addPost(
                $post
            );
            $this->addMessageFlash("L'article à bien été enregistré", self::TYPE_FLASH_SUCCESS);
            $this->redirect('posts');
        }
        $this->render("PostCreation");
    }
}