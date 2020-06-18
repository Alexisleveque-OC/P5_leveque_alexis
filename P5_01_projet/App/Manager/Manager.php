<?php


namespace App\Manager;

use \PDO;


class Manager
{
    protected static function dbConnect()
    {
        $database = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $database;
    }
}