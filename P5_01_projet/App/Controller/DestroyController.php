<?php


namespace App\Controller;


class DestroyController extends Controller
{
    public function destroy(){
        session_destroy();
        $this->redirect('home');
    }
}