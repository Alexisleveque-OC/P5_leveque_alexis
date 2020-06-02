<?php


namespace App\Manager;

use App\Entity\User;
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

    public  function listInfoUser($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE id_user = :id_user ') ;
        $req->execute(['id_user' => $id]);
        $data = $req->fetch( PDO::FETCH_ASSOC);
        $user = $this->arrayDataToUser($data);
        return $user;
    }

    public static function arrayDataToUser($data)
    {
        $user = new User();
        $user->setIdUser($data['id_user'] ?? "");
        $user->setUserName($data['user_name'] ?? "");
        $user->setEmail($data['email'] ?? "");
        $user->setPassword($data['password'] ?? "");
        $user->setUserType($data['user_type'] ?? '');
        $user->setDateCreation(new \DateTime($data['date_creation'] ?? ''));

        return $user;
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