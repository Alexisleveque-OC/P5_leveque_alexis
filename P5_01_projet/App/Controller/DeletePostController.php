<?php


namespace App\Controller;

use App\Manager\PostsManager;

class DeletePostController extends Controller
{
    public function deletePost($idPost)
    {
        $this->checkIfUserIsAdmin();

        $infoPost = $this->countInfoPost();
        if ($infoPost === 1) {
            $answer = filter_input(INPUT_POST, 'answer');
            switch ($answer) {
                case 'yes':
                    $manager = new PostsManager();
                    $manager->deletePost($idPost);
                    $this->addMessageFlash("L'article a bien été supprimé.", self::TYPE_FLASH_SUCCESS);
                    $this->redirect('posts');
                    break;
                case 'no' :
                    $this->addMessageFlash("L'article n'a pas été supprimé.", self::TYPE_FLASH_INFO);
                    $this->redirect('posts');
                    break;
            }
        }
        $manager = new PostsManager();
        $post = $manager->listOnce($idPost);
        $this->render("Delete", [
            'post' => $post
        ]);
    }
}