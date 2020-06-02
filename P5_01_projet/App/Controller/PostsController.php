<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;

class PostsController extends Controller
{
    public function __invoke()
    {
        $manager = new PostsManager();
        $manager->countPost();
        $posts= $manager->listAllPosts(5, $_GET['page'] ?? 1);

        $this->needLoad('Posts');
    }

}