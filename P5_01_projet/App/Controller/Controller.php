<?php


namespace App\Controller;


use App\Entity\User;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Service\ViewLoader;
use Exception;


abstract class Controller
{
    const TYPE_FLASH_SUCCESS = 'success';
    const TYPE_FLASH_ERROR = 'danger';
    const TYPE_FLASH_INFO = 'info';
    /**
     * @var CommentManager
     */
    private $commentManager;
    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var mixed
     */
    private $session;


    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function render($path, $params = [])
    {
        $params += ['flash' => $this->getAndCleanMessageFlash()];

        ViewLoader::render($path, $params);
    }

    public function countInfoPost()
    {
        $infoPost = count($_POST);
        return $infoPost;
    }

    public function getAndCleanMessageFlash()
    {
        if (isset($session['flash'])) {
            $flash = $session['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }

        return null;
    }

    public function addMessageFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function connectUser(User $user)
    {
        $_SESSION['user_name'] = $user->getUserName();
        $_SESSION['id_user'] = $user->getIdUser();
    }

    public function getUserConnected(): ?User
    {

        if (!isset($_SESSION['id_user'])) {
            return null;
        }

        $user = new User();
        $user->setIdUser($_SESSION['id_user']);
        $user->setUserName($_SESSION['user_name']);

        return $user;
    }

    public function checkIfUserIsConnected()
    {
        if (!$this->getUserConnected()) {
            throw new Exception("Vous devez-vous connecter.");
        }
    }

    public function checkIfUserIsAdmin()
    {
        $userForVerif = $this->getUserConnected();
        $this->checkIfUserIsConnected();
        $manager = new UserManager();
        $user = $manager->searchInfoUser($userForVerif->getUserName());
        if ($user->getUserTypeId() != 2) {
            throw new Exception("Vous n'êtes pas administrateur.");
        }
    }

    public function redirect($action, array $params = null)
    {
        $baseUrl = "/index.php?action=" . $action;
        $queryParams = "";
        if ($params !== null) {
            foreach ($params as $key => $value) {
                $queryParams .= "&" . $key . "=" . $value;
            }
        }
        header('Location: ' . $baseUrl . $queryParams);
    }
}