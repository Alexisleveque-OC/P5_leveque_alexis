<?php


namespace App\Controller;


class ConnectionController
{
    public function __invoke()
    {
        require __DIR__ . '/../View/Connection.php';
    }
}