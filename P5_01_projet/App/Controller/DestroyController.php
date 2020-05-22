<?php


namespace App\Controller;


class DestroyController
{
    public function destroy(){
        session_destroy();
        header ('Location: /index.php');
    }
}