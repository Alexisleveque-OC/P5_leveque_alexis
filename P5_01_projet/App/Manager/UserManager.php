<?php


namespace App\Manager;


class UserManager extends Manager
{
    public function AddUser($name,$password,$email, $user_type_id){
        $db = $this->dbConnect();
        $req= $db->prepare('INSERT INTO user(user_name,email,password,user_type_id,date_creation) 
                                    VALUE (?,?,?,?,NOW())');
        $req->execute(array($name,$password,$email,$user_type_id));
    }


}