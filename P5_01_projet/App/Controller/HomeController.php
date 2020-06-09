<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (count($_POST) !== 0) {
            self::sendMail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['messsage']);
            $this->redirect('MailSend');
        }
        $manager = new PostsManager();
        $posts = $manager->listAllPosts(3);
        $users = [];
        foreach ($posts as $post) {
            $userManager = new UserManager();
            $users[] = $userManager->listInfoUser($post->getUserId());
        }
        require $this->needLoad('Home');

    }

    private static function sendMail($name,$email,$phone,$message)
    {
        if (empty($name) ||
            empty($email) ||
            empty($phone) ||
            empty($message) ||
            !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Throw new \Exception("Tous les champs n'ont pas été remplis");
        }

        $name = strip_tags(htmlspecialchars($name));
        $email_address = strip_tags(htmlspecialchars($email));
        $phone = strip_tags(htmlspecialchars($phone));
        $message = strip_tags(htmlspecialchars($message));

        $to = 'alexis.leveque78@gmail.com';
        $email_subject = "Envoyer depuis le blog du projet_5 par:  $name";
        $email_body = "Vous avez reçu un nouvelle e-mail.\n\n" . "De:\n\nName: $name\n\nAdresse e-mail de l'éxpediteur: $email_address\n\nNuméro de téléphone: $phone\n\nMessage:\n$message";
        $headers = "de : noreply@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address";
        mail($to, $email_subject, $email_body, $headers);
    }
}