<?php


namespace App\Entity;


class Post extends Entity implements CheckValidityInterface
{
    protected $id_post;
    protected $title;
    protected $chapo;
    protected $content;
    protected $date_creation;
    protected $date_last_update;
    protected $user_id;

    /** @var User|null */
    protected $user;

    protected $counter;

    public function __construct()
    {

    }


    /**
     * @return mixed
     */
    public function getIdPost()
    {
        return $this->id_post;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @return \DateTime|null
     */
    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateLastUpdate(): ?\DateTime
    {
        return $this->date_last_update;
    }


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $id_post
     */
    public function setIdPost($id_post)
    {
        $this->id_post = $id_post;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     */
    public function setDateCreation(\DateTime $date_creation)
    {
        $this->date_creation = $date_creation;

    }

    /**
     * @param mixed $date_last_update
     */
    public function setDateLastUpdate(\DateTime $date_last_update)
    {

        $this->date_last_update = $date_last_update;

    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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

    /**
     * @return mixed
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param mixed $counter
     */
    public function setCounter($counter): void
    {
        $this->counter = $counter;
    }
    public function getErrors() : array
    {
        $errors = [];

        if(strlen($this->content) < 3){
            $errors[] = "Le contenu du post  doit faire plus de 3 caractères";
        }
        if(strlen($this->title) < 3){
            $errors[] = "Le titre du post  doit faire plus de 3 caractères";
        }
        if(strlen($this->chapo) < 3){
            $errors[] = "Le chapô du post  doit faire plus de 3 caractères";
        }

        return $errors;
    }

}