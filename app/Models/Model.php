<?php
namespace App\Models;

use PDO;
use DateTime;
use Database\DbConnection;

class Model{

    protected $table;
    protected $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    /**
     * Renvoie tous les enrégistrements d'une table en base de donnée
     *
     * @return array
     */

    public function findAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    /**
     * Renvoie tous les enrégistrements d'un champ d'une table en base de donnée
     *
     * @param integer $id
     * @return Model
     */

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Permet de supprimer les enrégistrement d'un champ d'une table en base de donnée
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ? ", [$id]);
    }

    /**
     * Permet d'inserer un nouvel enrégistrement dans une table en base de donnée
     *
     * @param array $data Tableau constitué des champs avec leurs valeurs
     * @return void
     */

    public function create(array $data)
    {
        $fields = "";
        $values = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = count($data) === $i ? ' ' : ', ';
            $fields .= "{$key}{$comma}";
            $values .= ":{$key}{$comma}";
            $i++;
        }
        return $this->query("INSERT INTO {$this->table}($fields) VALUES($values)", $data);
    }

    /**
     * Permet de mettre à jour un champ d'une base de donnée
     *
     * @param array $data Tableau constitué des champs avec leurs valeurs
     * @param integer $id L'indentifiant du champ
     * @return void
     */

    public function update(array $data, int $id)
    {
        $partSql = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = count($data) === $i ? "" : ", ";
            $partSql .= "{$key}=:{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;
        return $this->query("UPDATE {$this->table} SET $partSql WHERE id= :id", $data);
    }

    /**
     * Permet d'exécuter des requêtes sql
     *
     * @param string $sql Requête SQL
     * @param array $data Tableau de valeurs
     * @param boolean $single 
     * @return Model
     */

    public function query(string $sql, array $data = null, bool $single = null)
    {
        $mode = is_null($data) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        $stmt = $this->db->getPDO()->$mode($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if (strpos($sql, 'INSERT') === 0 ||
            strpos($sql, 'UPDATE') === 0 ||
            strpos($sql, 'DELETE') === 0 ) {

            $stmt = $this->db->getPDO()->$mode($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($data);
             
        }

        if ($mode === 'query') {
            return $stmt->$fetch();
        }else {
            $stmt->execute($data);
            return $stmt->$fetch();
        }
    }

    public function createdAt()
    {
        return strtolower((new DateTime($this->created_at))->format(" d/m/Y à H:i"));
    }

}