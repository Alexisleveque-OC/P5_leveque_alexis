<?php


namespace App\Entity;


use App\Manager\UserManager;

class Comment extends Entity implements CheckValidityInterface
{
    protected $id_comment;
    protected $content;
    protected $date_creation;
    protected $validation;
    protected $user_id;
    protected $post_id;


    protected $user;
    public function __construct()
    {
        
    }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->id_comment;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    /**
     * @return mixed
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @return mixed
     */
//    public function getUserName()
//    {
//        return $this->user_name;
//    }
//
//    /**
//     * @param mixed $user_name
//     */
//    public function setUserName($user_id)
//    {
//        $manager = new UserManager();
//        $user = $manager->listInfoUser($user_id);
//        $this->user_name = $user->getUserName();
//    }

    /**
     * @param mixed $id_comment
     */
    public function setIdComment($id_comment)
    {
        $this->id_comment = $id_comment;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $date
     */
    public function setDateCreation( \DateTime $date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @param mixed $validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {

        $this->post_id = $post_id;
    }

    /**
     * @return ?User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param ?User $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function getErrors() : array
    {
        $errors = [];

        if(strlen($this->content) < 3){
            $errors[] = "Un commentaire doit faire plus de 3 caractères";
        }

        return $errors;
    }


}