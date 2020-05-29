<?php


namespace App\Entity;


class Comment extends Entity
{
    protected $id_comment;
    protected $content;
    protected $date_creation;
    protected $validation;
    protected $user_id;
    protected $post_id;

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


}