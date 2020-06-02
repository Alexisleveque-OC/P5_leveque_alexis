<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;

class DeleteController extends Controller
{
    public function deletePost($id)
    {
        $manager = new PostsManager();
        $post = $manager->listOnce($id);
//        $userManager = new UserManager()
        $this->needLoad('Delete');
        if (isset($_POST['yes']))
        {
            $manager = new PostsManager();
            $deletedPost = $manager->deletePost($id);
            $this->redirect('posts');
        }
        elseif (isset($_POST['no']))
        {
            $this->redirect('posts');
        }
    }
}