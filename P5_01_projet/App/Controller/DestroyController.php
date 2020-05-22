<?php


namespace App\Controller;


class DestroyController
{
    public function destroy(){
        session_destroy();
        require ('../../Public/index.php');
    }
}