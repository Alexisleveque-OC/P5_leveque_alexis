<?php


namespace App\Manager;

use App\Entity\Comment;
use PDO;

class CommentManager extends Manager
{
    public function addComment($content, $user_id, $post_id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO comment(content,date_creation,validation,user_id,post_id) 
                                      VALUE (:content,NOW(),:validation,:user_id, :post_id)');
        $req->execute([
            'content' => $content,
            'validation' => 0,
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
    }

    public function listComments($id)
    {
        $comments = [];
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comment c
        INNER JOIN user u on c.user_id = u.id_user
        WHERE post_id = :post_id AND validation = :validation ORDER BY id_comment DESC ');
        $req->execute([
            'post_id' => $id,
            'validation' => 1
        ]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $comments[] = $this->arrayDataToComment($row);
        }

        return $comments;
    }

    public function deleteComment($id)
    {

        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM comment WHERE id_comment = :id');
        $req->execute(['id' => $id]);

    }

    public function listCommentsUnvalidate()
    {
        $comments = [];
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
FROM comment c 
INNER JOIN user u ON c.user_id = u.id_user
WHERE validation = :validation ORDER BY id_comment DESC ');
        $req->execute(['validation' => 0]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $comments[] = $this->arrayDataToComment($row);
        }

        return $comments;
    }

    public function validateComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment 
                                      SET validation = :validation 
                                    WHERE id_comment = :id_comment');
        $req->execute([
            'validation' => 1,
            'id_comment' => $id
        ]);
    }

    public function arrayDataToComment($data)
    {
        $comment = new Comment();
        $comment->setIdComment($data['id_comment'] ?? "");
        $comment->setContent($data['content'] ?? "");
        $comment->setDateCreation(new \DateTime($data['date_creation'] ?? ''));
        $comment->setValidation($data['validation'] ?? "");
        $comment->setUserId($data['user_id'] ?? "");
        $comment->setPostId($data['post_id'] ?? "");

        if ($data['user_name'] ?? false) {
            $user = UserManager::arrayDataToUser($data);
            $comment->setUser($user);
        }

        return $comment;
    }
}