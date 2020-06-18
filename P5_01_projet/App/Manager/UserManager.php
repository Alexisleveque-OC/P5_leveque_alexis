<?php


namespace App\Manager;

use App\Entity\User;
use DateTime;
use Exception;
use \PDO;


class UserManager extends Manager
{

    public function addUser(User $user)
    {

        $hash = $this->encodePassword($user->getPassword());

        $database = self::dbConnect();

        $req = $database->prepare('INSERT INTO user(user_name,email,password,user_type_id,date_creation) 
                                    VALUE (:name,:email,:pass,:type,NOW())');
        $req->execute([
            'name' => $user->getUserName(),
            'email' => $user->getEmail(),
            'pass' => $hash,
            'type' => 1
        ]);
        $data = $this->searchInfoUser($user->getUserName());
        return $data;
    }

    public function verifUser(User $user)
    {
        $data = $this->searchInfoUser($user->getUserName());
        if ($data === false) {
            throw new Exception('Le nom que vous avez choisis existe déjà.');
        }
    }

    /**
     * @param $name
     * @param $password
     * @return User
     * @throws Exception
     */
    public function verifPass($name,$password)
    {
        $user = $this->searchInfoUser($name);
        $verif = password_verify($password, $user->getPassword());

        if($verif === false){
            throw new Exception('Le mot de passe entré n\'est pas valide');
        }

        return $user;
    }

    public  function searchInfoUser($name)
    {
        $database = self::dbConnect();
        $req = $database->prepare('SELECT *, date_creation as user_date FROM user WHERE user_name = :name ') ;
        $req->execute(['name' => $name]);
        $data = $req->fetch( PDO::FETCH_ASSOC);
        $user = $this->arrayDataToUser($data);
        return $user;
    }

    public function arrayDataToUser($data)
    {
        $user = new User();
        $user->setIdUser($data['id_user'] ?? "");
        $user->setUserName($data['user_name'] ?? "");
        $user->setEmail($data['email'] ?? "");
        $user->setPassword($data['password'] ?? "");
        $user->setUserType($data['user_type_id'] ?? '');
        $user->setDateCreation(new DateTime($data['user_date'] ?? ''));

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