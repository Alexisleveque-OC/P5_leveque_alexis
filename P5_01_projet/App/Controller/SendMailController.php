<?php


use App\Controller\Controller;

class SendMailController extends Controller
{
    public function sendMail($name, $email, $phone, $message)
    {
        if (empty($name) ||
            empty($email) ||
            empty($phone) ||
            empty($message) ||
            !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Tous les champs n'ont pas été remplis");
        }

        $name = strip_tags(htmlspecialchars($name));
        $email_address = strip_tags(htmlspecialchars($email));
        $phone = strip_tags(htmlspecialchars($phone));
        $message = strip_tags(htmlspecialchars($message));

        $to = 'alexisblog@blog-p5.alexis-leveque.fr';
        $email_subject = "Envoyer depuis le blog du projet_5 par:  $name";
        $email_body = "Vous avez reçu un nouvelle e-mail.\n\n" . "De:\n\nName: $name\n\nAdresse e-mail de l'éxpediteur: $email_address\n\nNuméro de téléphone: $phone\n\nMessage:\n$message";
        $headers = "de : noreply@gmail.com\n";
        $headers .= "Reply-To: $email_address";
        mail($to, $email_subject, $email_body, $headers);
        $this->redirect('mailSend');
    }
}