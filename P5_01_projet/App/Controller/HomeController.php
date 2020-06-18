<?php


namespace App\Controller;


use App\Entity\Mail;
use App\Manager\PostsManager;

class HomeController extends Controller
{
    public function __invoke()
    {
        $infoPost = $this->countInfoPost();
        if ($infoPost !== 0) {
            $mail = new Mail();
            $mail->setName(filter_input(INPUT_POST,'name'));
            $mail->setEmail(filter_input(INPUT_POST,'email'));
            $mail->setPhone(filter_input(INPUT_POST,'phone'));
            $mail->setMessage(filter_input(INPUT_POST,'message'));
            $errors = $mail->getErrors();
            if (count($errors)) {
                throw new \Exception(implode($errors, " "));
            }
            self::sendMail($mail);
            $this->redirect('mailSend');
        }
        $manager = new PostsManager();
        $posts = $manager->listAllPosts(3);

        $this->render("Home", [
            'posts' => $posts,
        ]);

    }

    private static function sendMail($mail)
    {
        
        $name = htmlspecialchars($mail->getName());
        $email_address =htmlspecialchars($mail->getEmail());
        $phone = htmlspecialchars($mail->getPhone());
        $message = htmlspecialchars($mail->getMessage());

        $email_subject = "Envoyer depuis le blog du projet_5 par:  $name";
        $email_body = "Vous venez de recevoir un nouvel e-mail.\n\n" . "De:\n\n $name\n\nAdresse e-mail de l'expediteur: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
        $headers = "de : noreply@gmail.com\n";
        $headers .= "Reply-To: $email_address";
        mail(MAIL_TO, $email_subject, $email_body, $headers);
    }
}