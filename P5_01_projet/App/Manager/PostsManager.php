<?php


namespace App\Manager;


use App\Entity\Post;
use DateTime;
use \PDO;

class PostsManager extends Manager
{
    public function countPost()
    {
        $database = self::dbConnect();
        $req = $database->query('SELECT count(*)  FROM post');
        $data = $req->fetchColumn();
        return $data;
    }

    public function addPost(Post $post)
    {
        $database = self::dbConnect();
        $req = $database->prepare('INSERT INTO post(title,chapo,content,date_creation,date_last_update,user_id) 
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
        $database = self::dbConnect();

        $req = $database->prepare('
SELECT p.id_post,p.title,p.chapo,p.content as post_content, p.date_creation as post_date,p.date_last_update,p.user_id ,
u.id_user, u.user_name,u.email,u.user_type_id, u.date_creation as user_date
FROM post AS p 
INNER JOIN user AS u ON p.user_id = u.id_user
WHERE id_post = :id');
        $req->execute(['id' => $idPost]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = $this->arrayDataToPost($data);
        return $post;
    }

    public function listAllPosts($limit, $pageNb = 1)
    {
        $posts = [];
        $database = self::dbConnect();
        $firstEntry = ($pageNb - 1) * 5;
        $req = $database->query('
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
            $posts[] = $this->arrayDataToPost($row);
        }
        dd($posts);
        return $posts;
    }

    public function updatePost(Post $post)
    {
        $database = self::dbConnect();

        $req = $database->prepare('UPDATE post 
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
        $database = self::dbConnect();

        $req = $database->prepare('DELETE FROM comment WHERE post_id = :id');
        $req->execute(['id' => $idPost]);
        $req = $database->prepare('DELETE FROM post WHERE id_post = :id');
        $req->execute(['id' => $idPost]);
    }

    public function arrayDataToPost($data)
    {
        $post = new Post();
        $post->setIdPost($data['id_post'] ?? "");
        $post->setTitle($data['title'] ?? "");
        $post->setChapo($data['chapo'] ?? "");
        $post->setContent($data['post_content'] ?? "");
        $post->setDateCreation(new DateTime($data['post_date'] ?? ''));
        $post->setcounterComment($data['counterComment'] ?? 0);

        if ($data['date_last_update'] !== null) {
            $post->setDateLastUpdate(new DateTime($data['date_last_update'] ?? ''));
        }
        $post->setUserId($data['user_id'] ?? "");

        if ($data['user_name'] ?? false) {
            $manager = new UserManager();
            $user = $manager->arrayDataToUser($data);
            $post->setUser($user);
        }

        return $post;
    }

}