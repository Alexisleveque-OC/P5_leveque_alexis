<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Service\ViewLoader;

class PostsController extends Controller
{
    public function __invoke()
    {
        $manager = new PostsManager();
//        $countPost = $manager->countPost();
        $posts = $manager->listAllPosts(5, $_GET['page'] ?? 1);

        ViewLoader::render("Posts", [
            'countPost' => $manager->countPost(),
            'posts' => $posts
        ]);
    }

}