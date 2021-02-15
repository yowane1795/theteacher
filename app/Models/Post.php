<?php
namespace App\Models;

use DateTime;

class Post extends Model{
    
    protected $table = 'post';

    /**
     * Permet de reduire le contenu d'un post à 100 caractères
     *
     * @return string
     */

    public function getContent()
    {
        return strip_tags(substr($this->content, 0, 100))."...";
    }

    /**
     * Permet de formater la date
     *
     * @return string
     */

    public function createdAt()
    {
        return strtolower((new DateTime($this->created_at))->format(" d/m/Y à H:i"));
    }

    /**
     * Renvoie tous les enrégistrements en base de donnée concernant un cour particulier
     *
     * @param string $course Nom du cour
     * @return array
     */
    public function getCourse(string $course)
    {
        return $this->query("SELECT * FROM post WHERE slug = ?", [$course]);
    }


    public function postComment(int $id)
    {
        return $this->query("SELECT COUNT(co.id) as count FROM comment co, post po 
                            WHERE id_post = ?
                            AND co.id_post = po.id", [$id], true);
    }


    public function getComment(int $id)
    {
        return $this->query("SELECT co.content, co.created_at, us.username FROM comment co, user us WHERE id_post = ?
                            AND co.id_user = us.id ORDER BY created_at", [$id]);
    }
}