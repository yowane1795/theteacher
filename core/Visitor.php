<?php

use App\Models\Model;
use Database\DbConnection;

class Visitor{

    private static $table = 'visitor';


    public static function getSql()
    {
        $db = new DbConnection(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $sql = new Model($db);

        return $sql;
    }
    public static function addVisitor(){
       
        $data = [];
        $data['id'] = $_SERVER['REMOTE_ADDR']; 
        $data['created_at'] = date('Y-m-d H:i:s');
        
        return self::getSql()->query("INSERT INTO ".self::$table."(id , created_at, page_view) VALUES (:id , :created_at , 1) 
                            ON DUPLICATE KEY UPDATE page_view = 1", $data);          
    }

    public static function getVisitor()
    {
        return self::getSql()->query("SELECT COUNT(id) as visitor FROM ".self::$table);
    }
}