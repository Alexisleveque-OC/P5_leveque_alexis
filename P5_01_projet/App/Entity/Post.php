<?php


namespace App\Entity;


class Post extends Entity
{
    protected $id_post;
    protected $title;
    protected $chapo;
    protected $content;
    protected $date_creation;
    protected $date_last_update;
    protected $is_published;
    protected $user_id;

    protected function __construct(array $data)
    {
        $this->hydrate($data);
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
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @return mixed
     */
    public function getDateLastUpdate()
    {
        return $this->date_last_update;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->is_published;
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
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @param mixed $date_last_update
     */
    public function setDateLastUpdate($date_last_update)
    {
        $this->date_last_update = $date_last_update;
    }

    /**
     * @param mixed $is_published
     */
    public function setIsPublished($is_published)
    {
        $this->is_published = $is_published;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

}