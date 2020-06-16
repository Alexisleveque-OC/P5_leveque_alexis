<?php


namespace App\Manager;


use App\Entity\Post;
use \PDO;

class PostsManager extends Manager
{
    public function countPost()
    {
        $db = self::dbConnect();
        $req = $db->query('SELECT count(*)  FROM post');
        $data = $req->fetchColumn();
        return $data;
    }

    public function addPost(Post $post)
    {
        $db = self::dbConnect();
        $req = $db->prepare('INSERT INTO post(title,chapo,content,date_creation,date_last_update,user_id) 
                                      VALUE (:title,:chapo,:content,NOW(), :date_last_update,:user_id)');
        $req->execute([
            'title' => $post->getTitle(),
            'chapo' => $post->getChapo(),
            'content' => $post->getContent(),
            'date_last_update' => null,
            'user_id' => $post->getUserId()
        ]);
    }

    public function listOnce($idPost)
    {
        $db = self::dbConnect();

        $req = $db->prepare('
SELECT p.id_post,p.title,p.chapo,p.content as post_content, p.date_creation as post_date,p.date_last_update,p.user_id ,
u.id_user, u.user_name,u.email,u.user_type_id, u.date_creation as user_date
FROM post AS p 
INNER JOIN user AS u ON p.user_id = u.id_user
WHERE id_post = :id');
        $req->execute(['id' => $idPost]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = PostsManager::arrayDataToPost($data);
        return $post;
    }

    public function listAllPosts($limit, $pageNb = 1)
    {
        $posts = [];
        $db = self::dbConnect();
        $firstEntry = ($pageNb - 1) * 5;
        $req = $db->query('
SELECT p.id_post , p.title, p.chapo, p.content as post_content,p.date_creation as post_date, p.date_last_update,p.user_id,
u.id_user, u.user_name,u.email,u.user_type_id, u.date_creation as user_date, COUNT(c.id_comment) as counterComment
FROM post  p
INNER JOIN user as u ON p.user_id = u.id_user
LEFT JOIN comment c ON c.post_id = p.id_post
WHERE c.validation = 1
GROUP BY p.id_post
ORDER BY p.id_post DESC LIMIT ' . $firstEntry . ',' . $limit);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $posts[] = self::arrayDataToPost($row);
        }
        return $posts;
    }

    public function updatePost(Post $post)
    {
        $db = self::dbConnect();

        $req = $db->prepare('UPDATE post 
                                    SET title = :title ,chapo = :chapo , content = :content , date_last_update = NOW(),user_id = :user_id 
                                    WHERE id_post = :id');
        $req->execute([
            'id' => $post->getIdPost(),
            'title' => $post->getTitle(),
            'chapo' => $post->getChapo(),
            'content' => $post->getContent(),
            'user_id' => $post->getUserId()
        ]);
    }

    public function deletePost($idPost)
    {
        $db = self::dbConnect();

        $req = $db->prepare('DELETE FROM comment WHERE post_id = :id');
        $req->execute(['id' => $idPost]);
        $req = $db->prepare('DELETE FROM post WHERE id_post = :id');
        $req->execute(['id' => $idPost]);
    }

    public static function arrayDataToPost($data)
    {
        $post = new Post();
        $post->setIdPost($data['id_post'] ?? "");
        $post->setTitle($data['title'] ?? "");
        $post->setChapo($data['chapo'] ?? "");
        $post->setContent($data['post_content'] ?? "");
        $post->setDateCreation(new \DateTime($data['post_date'] ?? ''));
        $post->setcounterComment($data['counterComment'] ?? 0);

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