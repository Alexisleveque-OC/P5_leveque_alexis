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
            $infos = self::refactorSupervariable($_POST);
            $infosSession = self::refactorSupervariable($_SESSION);
            $post = new Post();
            $post->setTitle($infos['title']);
            $post->setChapo($infos['chapo']);
            $post->setContent($infos['content']);

            $post->getErrors();
            $errors = $post->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }
            $manager = new PostsManager();
            $manager->addPost(
                $infos['title'],
                $infos['chapo'],
                $infos['content'],
                $infosSession['id_user']
            );
            $this->redirect('posts');
        }
        ViewLoader::render("PostCreation");
    }
}