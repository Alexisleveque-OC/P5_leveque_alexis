<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;
use App\Service\ViewLoader;

class PostsController extends Controller
{
    public function __invoke()
    {
        $manager = new PostsManager();
        $count = $manager->countPost();
        $posts = $manager->listAllPosts(5, $_GET['page'] ?? 1);

        ViewLoader::render("Posts", [
            'count' => $manager->countPost(),
            'posts' => $posts
        ]);
    }

}