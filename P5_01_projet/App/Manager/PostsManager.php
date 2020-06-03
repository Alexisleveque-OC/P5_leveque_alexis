<?php


namespace App\Manager;


use App\Entity\Entity;
use App\Entity\Post;
use App\Entity\User;
use \PDO;

class PostsManager extends Manager
{
    public function countPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(*)  FROM post');
        $data = $req->fetch();

        return $data;
    }

    public function addPost($title, $chapo, $content, $user_id)
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

        $req = $db->prepare('
SELECT p.id_post,p.title,p.chapo,p.content as post_content, p.date_creation as post_date,p.date_last_update,p.user_id ,
u.id_user, u.user_name,u.email,u.user_type_id, u.date_creation as user_date
FROM post AS p 
INNER JOIN user AS u ON p.user_id = u.id_user
WHERE id_post = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = PostsManager::arrayDataToPost($data);
        return $post;
    }

    public function listAllPosts($limit , $pageNb )
    {
        $posts = [];
        $db = $this->dbConnect();
        $firstEntry = ($pageNb -1) * 5;
        $req = $db->query('
SELECT p.id_post , p.title, p.chapo, p.content as post_content,p.date_creation as post_date, p.date_last_update,p.user_id,
u.id_user, u.user_name,u.email,u.user_type_id, u.date_creation as user_date
FROM post  p
INNER JOIN user as u ON p.user_id = u.id_user
ORDER BY id_post DESC LIMIT ' .$firstEntry.','. $limit);

        // TODO jaouter limit et offset à la requete
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $posts[] = self::arrayDataToPost($row);
        }

        return $posts;

    }

    public function updatePost($id, $title, $chapo, $content, $user_id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE post 
                                    SET title = :title ,chapo = :chapo , content = :content , date_last_update = NOW(),user_id = :user_id 
                                    WHERE id_post = :id');
        $req->execute([
            'id' => $id,
            'title' => $title,
            'chapo' => $chapo,
            'content' => $content,
            'user_id' => $user_id
        ]);
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM post WHERE id_post = :id');
        $req->execute(['id' => $id]);
    }

    public static function arrayDataToPost($data)
    {
        $post = new Post();
        $post->setIdPost($data['id_post'] ?? "");
        $post->setTitle($data['title'] ?? "");
        $post->setChapo($data['chapo'] ?? "");
        $post->setContent($data['post_content'] ?? "");
        $post->setDateCreation(new \DateTime($data['post_date'] ?? ''));
        if ($data['date_last_update'] !== null) {
            $post->setDateLastUpdate(new \DateTime($data['date_last_update'] ?? ''));
        }
        $post->setUserId($data['user_id'] ?? "");

        if ($data['user_name'] ?? false) {
            $user = UserManager::arrayDataToUser($data);
            $post->setUser($user);
        }

        return $post;
    }


}