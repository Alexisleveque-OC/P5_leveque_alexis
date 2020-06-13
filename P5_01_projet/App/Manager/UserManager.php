<?php


namespace App\Manager;

use App\Entity\User;
use \PDO;


class UserManager extends Manager
{

    public function addUser($name, $plainPassword, $email, $user_type_id)
    {

        $hash = $this->encodePassword($plainPassword);

        $db = self::dbConnect();


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
        $user = $this->searchInfoUser($name);
        $verif = password_verify($password, $user->getPassword());

        if($verif === false){
            throw new \Exception('Le mot de passe entré n\'est pas valide');
        }
        return $user;
    }

    public  function searchInfoUser($name)
    {
        $db = self::dbConnect();
        $req = $db->prepare('SELECT *, date_creation as user_date FROM user WHERE user_name = :name ') ;
        $req->execute(['name' => $name]);
        $data = $req->fetch( PDO::FETCH_ASSOC);
        $infoUser = $this->arrayDataToUser($data);
        return $infoUser;
    }
    public  function searchUserType($name)
    {
        $db = self::dbConnect();
        $req = $db->prepare('SELECT user_type_id FROM user WHERE user_name = :name ') ;
        $req->execute(['name' => $name]);
        $userType = $req->fetchColumn();
        return $userType;
    }

    public  function listInfoUser($idUser)
    {
        $db = self::dbConnect();
        $req = $db->prepare('SELECT * , date_creation as user_date FROM user WHERE id_user = :id_user ') ;
        $req->execute(['id_user' => $idUser]);
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
        $user->setDateCreation(new \DateTime($data['user_date'] ?? ''));

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