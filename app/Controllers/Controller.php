<?php
namespace App\Controllers;

use Database\DbConnection;
use Session;

abstract class Controller{

    private $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    /**
     * Renvoie vers la vue correspondante
     *
     * @param string $path Chemin du fichier
     * @param array|null $param
     * @return void
     */
    
    protected function view(string $path, ?array $param = null)
    {
        ob_start();
        $path = str_replace('.', '/', $path);
        require VIEWS.$path.'.php';
        $param ?? $param = $param;
        $content = ob_get_clean();
        require VIEWS.'layouts'.DIRECTORY_SEPARATOR.'layout.php';
    }

    /**
     * Retourne une instance de la connexion à la base de donnée
     *
     * @return DbConnection
     */

    protected function getDB()
    {
        return $this->db;
    }

    /**
     * Verifie si l'utilisateur est l'administrateur
     *
     * @return boolean
     */

    protected function isAdmin()
    {
        if (Session::isset('auth') === 1) {
            return true;
        }else {
             header("Location: /login?success=false");
        }
    }

    /**
     * Verifie si l'utilisateur est connecté
     *
     * @return boolean
     */

    protected function isConnected()
    {
        if (Session::isset('auth') === 0 || Session::isset('auth') === 1) {
            return true;
        }else {
             header("Location: /login?success=false");
        }
    }
}