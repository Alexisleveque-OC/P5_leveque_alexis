<?php


namespace App\Manager;

use \PDO;
use \Exception;


class UserManager extends Manager
{
    public function AddUser($name,$password,$email, $user_type_id){
        $db = $this->dbConnect();
        $req= $db->prepare('INSERT INTO user(user_name,email,password,user_type_id,date_creation) 
                                    VALUE (?,?,?,?,NOW())');
        $req->execute(array($name,$password,$email,$user_type_id));
    }

    public function verifUser($name){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE user_name = ? ') or die(print_r($db->errorInfo()));
        $req->execute(array($name));
        $data = $req->fetch( PDO::FETCH_ASSOC);
        if ($data === false){
            return false;
        }
        else{
            throw new Exception('Le nom que vous avez choisis existe déjà.');
        }
    }

}