<?php


namespace App\Controller;


use App\Service\ViewLoader;

class MailSendController extends Controller
{

    public function __invoke()
    {
        $this->render("MailSend");
    }
}