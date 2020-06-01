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
        $req = $db->prepare('SELECT * FROM comment WHERE post_id = :post_id ORDER BY id_comment DESC ');
        $req->execute(['post_id' => $id]);
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

    public function arrayDataToComment($data)
    {
        $comment = new Comment();
        $comment->setIdComment($data['id_comment'] ?? "");
        $comment->setContent($data['content'] ?? "");
        $comment->setDateCreation(new \DateTime($data['date_creation'] ?? ''));
        $comment->setValidation($data['validation'] ?? "");
        $comment->setUserId($data['user_id'] ?? "");
        $comment->setPostId($data['post_id'] ?? "");
        $comment->setUserName($data['user_id'] ?? "");

        return $comment;
    }
}