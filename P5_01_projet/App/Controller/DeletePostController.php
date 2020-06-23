<?php


namespace App\Controller;

use App\Manager\PostsManager;

class DeletePostController extends Controller
{
    public function deletePost($idPost)
    {
        $this->checkIfUserIsAdmin();

        $needRedirect = false;

        $infoPost = $this->countInfoPost();
        if ($infoPost === 1) {
            $answer = filter_input(INPUT_POST, 'answer');
            switch ($answer) {
                case 'yes':
                    $manager = new PostsManager();
                    $manager->deletePost($idPost);
                    $this->addMessageFlash("L'article a bien été supprimé.", self::TYPE_FLASH_SUCCESS);
                    $needRedirect ='posts';
                    break;
                case 'no' :
                    $this->addMessageFlash("L'article n'a pas été supprimé.", self::TYPE_FLASH_INFO);
                    $needRedirect ='posts';
                    break;
            }
        }
        if($needRedirect){
            return $this->redirect('posts');
        }

        $manager = new PostsManager();
        $post = $manager->listOnce($idPost);
        $this->render("Delete", [
            'post' => $post
        ]);
    }
}