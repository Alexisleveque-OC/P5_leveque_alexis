<?php


namespace App\Manager;

use App\Entity\Comment;
use DateTime;
use PDO;

class CommentManager extends Manager
{
    public function addComment(Comment $comment)
    {
        $database = self::dbConnect();

        $req = $database->prepare('INSERT INTO comment(content,date_creation,validation,user_id,post_id) 
                                      VALUE (:content,NOW(),:validation,:user_id, :post_id)');
        $req->execute([
            'content' => $comment->getContent(),
            'validation' => $comment->getValidation(),
            'user_id' => $comment->getUserId(),
            'post_id' => $comment->getPostId()
        ]);
    }

    public function countCommentUnvalidate()
    {
        $database = self::dbConnect();
        $req = $database->prepare('SELECT count(*) FROM comment WHERE validation = :validation');
        $req->execute(['validation' => 0]);
        $result = $req->fetchColumn();
        return $result;
    }

    public function countCommentPost($idPost)
    {
        $database = self::dbConnect();
        $req = $database->prepare('SELECT count(*) FROM comment WHERE validation = :validation AND post_id = :post_id');
        $req->execute([
            'validation' => 1,
            'post_id' => $idPost
            ]);
        $result = $req->fetchColumn();

        return $result;
    }


    public function listComments($idPost, $limit, $pageNb)
    {
        $comments = [];
        $database = self::dbConnect();
        $firstEntry = ($pageNb -1) * $limit;
        $req = $database->prepare('SELECT 
       c.id_comment, c.content as comment_content, c.date_creation as comment_date, c.validation, c.user_id, post_id,
       u.id_user, u.user_name, u.email, u.password, u.user_type_id, u.date_creation AS user_date
FROM comment c 
INNER JOIN user u ON c.user_id = u.id_user
WHERE post_id = :post_id AND validation = :validation 
ORDER BY id_comment DESC LIMIT :offset , :limit');
        $req->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $req->bindValue(':offset', $firstEntry, \PDO::PARAM_INT);
        $req->bindValue(':post_id', $idPost, \PDO::PARAM_INT);
        $req->bindValue(':validation', 1, \PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $comments[] = $this->arrayDataToComment($row);
        }
        return $comments;
    }

    public function deleteComment($idcomment)
    {

        $database = self::dbConnect();

        $req = $database->prepare('DELETE FROM comment WHERE id_comment = :id');
        $req->execute(['id' => $idcomment]);

    }

    public function listCommentsUnvalidate()
    {
        $comments = [];
        $database = self::dbConnect();
        $req = $database->prepare('SELECT 
       c.id_comment, c.content as comment_content, c.date_creation as comment_date, c.validation, c.user_id, post_id,
       u.id_user, u.user_name, u.email, u.password, u.user_type_id, u.date_creation AS user_date
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

    public function validateComment($idComment)
    {
        $database = self::dbConnect();
        $req = $database->prepare('UPDATE comment 
                                      SET validation = :validation 
                                    WHERE id_comment = :id_comment');
        $req->execute([
            'validation' => 1,
            'id_comment' => $idComment
        ]);
    }

    public function arrayDataToComment($data)
    {
        $comment = new Comment();
        $comment->setIdComment($data['id_comment'] ?? "");
        $comment->setContent($data['comment_content'] ?? "");
        $comment->setDateCreation(new DateTime($data['comment_date'] ?? ''));
        $comment->setValidation($data['validation'] ?? "");
        $comment->setUserId($data['user_id'] ?? "");
        $comment->setPostId($data['post_id'] ?? "");

        if ($data['user_name'] ?? false) {
            $manager = new UserManager();
            $user =$manager->arrayDataToUser($data);
            $comment->setUser($user);
        }

        return $comment;
    }
}