<?php


namespace App\Entity;


interface CheckValidityInterface
{
    public function getErrors() : array;

}