<?php
namespace App\Models;

class User extends Model{

    protected $table = 'user';
    

    public function getUser($username)
    {
        return $this->query("SELECT * FROM user WHERE username = ?", [$username], true);
    }

    public function getUserMail($mail)
    {
        return $this->query("SELECT * FROM user WHERE mail = ?", [$mail], true);
    }

}