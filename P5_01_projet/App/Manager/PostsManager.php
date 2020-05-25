<?php


namespace App\Manager;


use App\Entity\Entity;
use App\Entity\Post;
use \PDO;

class PostsManager extends Manager
{
    public function addPost($title, $chapo, $content)
    {
        $db = $this->dbConnect();

        $reqUser = $db->query('SELECT * FROM user WHERE user_name = "' . $_SESSION['user_name'] . '"');
        $data = $reqUser->fetch(PDO::FETCH_ASSOC);


        $req = $db->prepare('INSERT INTO post(title,chapo,content,date_creation,date_last_update,user_id) 
                                      VALUE (:title,:chapo,:content,NOW(),:date_last_update,:user_id)');
        $req->execute([
            'title' => $title,
            'chapo' => $chapo,
            'content' => $content,
            'date_last_update' => null,
            'user_id' => $data['id_user']
        ]);
    }

    public function listOnce($id)
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM post WHERE id_post = "'.$id .'"');
        $post = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($post);
        $post = new Post($post);
        var_dump($post);
        die();
    }

//    public function listAllPosts()
//    {
//        $db = $this->dbConnect();
//        $posts = $db->query('SELECT * FROM post');
//        $data = $posts->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($data);
//        for ($i = 0; $i <= count($data); $i++) {
//            $data[$i] = new Post($data[$i]);
//            var_dump($data);
//        }
//
//
////            var_dump($post);
//
//        die();
//        return $req;
//
//    }
}