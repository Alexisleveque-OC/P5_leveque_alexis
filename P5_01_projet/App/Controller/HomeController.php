<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;

class HomeController extends Controller
{
    public function __invoke()
    {
        $manager = new PostsManager();
        $posts= $manager->listAllPosts(3,1);
        $users = [];
        foreach ($posts as $post)
        {
            $userManager = new UserManager();
            $users[] = $userManager->listInfoUser($post->getUserId());
        }

        require $this->needLoad('Home');
    }
}