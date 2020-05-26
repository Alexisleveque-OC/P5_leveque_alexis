<?php


namespace App\Controller;


use App\Manager\PostsManager;

class UpdatePostController extends Controller
{
    public function updatePost($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
        require __DIR__ . '/../View/PostUpdate.php';
    }
}