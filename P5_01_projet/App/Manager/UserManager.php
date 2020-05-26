<?php


namespace App\Manager;

use \PDO;
use \Exception;


class UserManager extends Manager
{

   // TODO à modifier pour crée une entity de user et accéder au info via des get
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
        $data = $this->searchInfoUser($name);
        return $data;
    }

    public function verifUser($name)
    {
        $data = $this->searchInfoUser($name);

        if ($data !== false) {
            throw new \Exception('Le nom que vous avez choisis existe déjà.');
        }
    }

    public function verifPass($name,$password)
    {
        $data = $this->searchInfoUser($name);

        $verif = password_verify($password,$data['password']);

        if($verif === false){
            throw new \Exception('Le mot de passe entré n\'est pas valide');
        }
        return $data;
    }

    public  function searchInfoUser($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE user_name = :name ') ;
        $req->execute(['name' => $name]);
        $data = $req->fetch( PDO::FETCH_ASSOC);
        return $data;
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