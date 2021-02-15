<?php
namespace App\Models;


class Comment extends Model{

    protected $table = 'comment';


   

    public function getUserComment(int $id)
    {
        return $this->query("SELECT DISTINCT us.username FROM comment co, user us 
                            WHERE co.id_user = us.id 
                            AND co.id_post = ?", [$id]);
    }
}