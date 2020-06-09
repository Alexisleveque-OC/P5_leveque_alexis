<?php


namespace App\Controller;

use App\Entity\Post;
use App\Manager\PostsManager;
use App\Service\ViewLoader;

class CreatePostController extends Controller
{
    public function addPost()
    {
        if (count($_POST) !== 0) {
            $post = new Post();
            $post->setTitle($_POST['title']);
            $post->setChapo($_POST['chapo']);
            $post->setContent($_POST['content']);

            $post->getErrors();
            $errors = $post->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }
            $manager = new PostsManager();
            $manager->addPost(
                $_POST['title'],
                $_POST['chapo'],
                $_POST['content'],
                $_SESSION['id_user']
            );
            $this->redirect('posts');
        }
        ViewLoader::render("PostCreation");
    }
}