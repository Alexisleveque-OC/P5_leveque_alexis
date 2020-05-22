<?php


namespace App\Manager;

use \PDO;
use \Exception;


class UserManager extends Manager
{
    public function addUser($name, $plainPassword, $email, $user_type_id)
    {

        $hash = $this->encodePassword($plainPassword);

        $db = $this->dbConnect();


        $req = $db->prepare('INSERT INTO user(user_name,email,password,user_type_id,date_creation) 
                                    VALUE (:name,:email,:pass,:type,NOW())');
        $req->execute([
            'name' => $name,
            'email' => $email,
            'pass' => $hash,
            'type' => $user_type_id
        ]);
    }

    public function verifUser($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE user_name = :name ') or die(print_r($db->errorInfo()));
        $req->execute(['name' => $name]);
        $data = $req->fetch(PDO::FETCH_ASSOC);


        if ($data !== false) {
            throw new \Exception('Le nom que vous avez choisis existe déjà.');
        }
    }

    /**
     * @param $password
     * @return false|string|null
     */
    public function encodePassword($password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }

}