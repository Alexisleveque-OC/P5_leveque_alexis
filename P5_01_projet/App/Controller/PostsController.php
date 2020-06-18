<?php


namespace App\Controller;


use App\Manager\PostsManager;

class PostsController extends Controller
{
    public function __invoke()
    {
        $manager = new PostsManager();
        $posts = $manager->listAllPosts(5, filter_input(INPUT_GET,'page') ?? 1);

        $this->render("Posts", [
            'countPost' => $manager->countPost(),
            'posts' => $posts
        ]);
    }

}