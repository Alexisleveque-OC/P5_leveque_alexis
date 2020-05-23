<?php


namespace App\Controller;

use App\Manager\PostsManager;

class CreatePostController
{
    public function addPost()
    {
        if (count($_POST) !== 0) {
            $manager = new PostsManager();
            $manager->addPost(
                $_POST['title'],
                $_POST['chapo'],
                $_POST['content']
            );
            Header ('Location: index.php?action=posts');
        }
        require __DIR__ . '/../View/PostCreation.php';
    }
}