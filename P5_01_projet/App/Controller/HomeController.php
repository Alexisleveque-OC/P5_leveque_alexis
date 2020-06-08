<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;

class HomeController extends Controller
{
    public function home()
    {

        if (count($_POST) === 4) {
            $controller = new \SendMailController();
            $controller->sendMail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['messsage']);
            $this->redirect('MailSend');
        }
        $manager = new PostsManager();
        $posts = $manager->listAllPosts(3, 1);
        $users = [];
        foreach ($posts as $post) {
            $userManager = new UserManager();
            $users[] = $userManager->listInfoUser($post->getUserId());
        }
        require $this->needLoad('Home');

    }
}