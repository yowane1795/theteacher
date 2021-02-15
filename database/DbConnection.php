<?php

namespace Database;

use PDO;

class DbConnection
{

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_host, $db_name, $db_user, $db_pass)
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    public function getPDO()
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass, [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                ]);
            } catch (\PDOException $e) {
                die('Error: Connection failed');
            }
        }
        return $this->pdo;
    }
}
