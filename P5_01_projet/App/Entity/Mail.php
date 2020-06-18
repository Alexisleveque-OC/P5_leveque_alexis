<?php


namespace App\Entity;


class Mail implements CheckValidityInterface
{
    protected $name;
    protected $phone;
    protected $email;
    protected $message;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }


    public function getErrors() : array
    {
        $errors = [];

        if(strlen($this->name) < 3){
            $errors[] = "Votre nom doit faire plus de 3 caractères.";
        }
        if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$this->phone)){
            $errors[] = "Votre numéro de téléphone n'est pas au format français valide. Exemple: 0102030405";
        }
        if(!preg_match("#^([a-z0-9_.-]+)@([a-z0-9_.-]{2,})\.([a-z]{2,4})$#",$this->email)){
            $errors[] = "Votre e-mail n'a pas un format valide. Exemple : Jean@super.com";
        }
        if(strlen($this->message) < 3){
            $errors[] = "Votre message doit faire plus de 3 caractères.";
        }

        return $errors;
    }

}