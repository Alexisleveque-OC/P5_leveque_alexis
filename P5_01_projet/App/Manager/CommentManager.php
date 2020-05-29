<?php


namespace App\Manager;


class CommentManager extends Manager
{
    public function addComment($content,$user_id,$post_id)
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
}