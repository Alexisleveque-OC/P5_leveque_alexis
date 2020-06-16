<?php


namespace App\Controller;


class MailSendController extends Controller
{

    public function __invoke()
    {
        $this->render("MailSend");
    }
}