<?php


namespace App\Manager;


use \PDO;

class PostsManager extends Manager
{
    public function addPost($title,$chapo,$content)
    {
        $db = $this->dbConnect();

        $reqUser = $db->query('SELECT * FROM user WHERE user_name = "'.$_SESSION['user_name'].'"' );
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
}