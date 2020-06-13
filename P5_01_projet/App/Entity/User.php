<?php

namespace App\Entity;

class User extends Entity implements CheckValidityInterface
{
    protected $id_user;
    protected $user_name;
    protected $email;
    protected $password;
    protected $user_type;
    protected $date_creation;

    public function __construct()
    {

    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }



    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }
    public function getErrors() : array
    {
        $errors = [];

        if (strlen($this->user_name) < 3) {
            $errors[] = "Le nom d'utilisateur doit faire plus de 3 caractères.";
        }
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $this->email)) {
            $errors[] = "L'adresse e-mail saisie n'a pas un format valide.";
        }
        if (strlen($this->password) < 5) {
            $errors[] = "Le mot de passe doit faire plus de 5 caractères.";
        }

        return $errors;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }


}