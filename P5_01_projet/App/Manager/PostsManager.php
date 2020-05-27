<?php


namespace App\Manager;


use App\Entity\Entity;
use App\Entity\Post;
use \PDO;

class PostsManager extends Manager
{
    public function addPost($title, $chapo, $content,  $user_id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO post(title,chapo,content,date_creation,date_last_update,user_id) 
                                      VALUE (:title,:chapo,:content,NOW(),:date_last_update,:user_id)');
        $req->execute([
            'title' => $title,
            'chapo' => $chapo,
            'content' => $content,
            'date_last_update' => null,
            'user_id' => $user_id
        ]);
    }

    public function listOnce($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM post WHERE id_post = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = $this->arrayDataToPost($data);
        return $post;
    }

    public function listAllPosts()
    {
        $posts = [];
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM post ORDER BY id_post DESC ');
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $row) {
            $posts[] = $this->arrayDataToPost($row);
        }

        return $posts;

    }

    public function updatePost($id,$title,$chapo,$content,$user_id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE post 
                                    SET title = :title ,chapo = :chapo , content = :content , date_last_update = NOW(),user_id = :user_id 
                                    WHERE id_post = :id') or die(print_r($db->errorInfo()));
        $req->execute([
            'id' => $id,
            'title' => $title,
            'chapo' => $chapo,
            'content' => $content,
            'user_id' => $user_id
        ]);

    }
    public function arrayDataToPost($data)
    {
        $post = new Post();
        $post->setIdPost($data['id_post'] ?? "");
        $post->setTitle($data['title'] ?? "");
        $post->setChapo($data['chapo'] ?? "");
        $post->setContent($data['content'] ?? "");
        $post->setDateCreation(new \DateTime($data['date_creation'] ?? ''));
        $post->setDateLastUpdate(new \DateTime($data['date_last_update'] ?? ''));
        $post->setUserId($data['user_id'] ?? "");

        return $post;
    }


}