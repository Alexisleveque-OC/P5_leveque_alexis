<?php


namespace App\Controller;


use App\Manager\PostsManager;
use App\Manager\UserManager;
use App\Service\ViewLoader;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (count($_POST) !== 0) {
            self::sendMail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message']);
            $this->redirect('mailSend');
        }
        $manager = new PostsManager();
        $posts = $manager->listAllPosts(3);

        ViewLoader::render("Home", [
            'posts' => $posts,
        ]);

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

        $email_subject = "Envoyer depuis le blog du projet_5 par:  $name";
        $email_body = "Vous venez de recevoir un nouvel e-mail.\n\n" . "De:\n\n $name\n\nAdresse e-mail de l'expediteur: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
        $headers = "de : noreply@gmail.com\n";
        $headers .= "Reply-To: $email_address";
        mail(MAIL_TO, $email_subject, $email_body, $headers);
    }
}