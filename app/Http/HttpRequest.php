<?php

namespace App\Http;

class HttpRequest
{
    private $post;
    private $errors;

    public function __construct()
    {
        $this->post = $this->name();
    }

    /**
     * Retourne les données envoyer en POST
     *
     * @param string $field Nom du champ
     * @return array
     */

    public function name(string $field = null)
    {
        if ($field !== null) {
            return $_POST[$field];
        } else {
            return $_POST;
        }
    }

    /**
     * Renvoie à l'url précédent
     *
     * @return void
     */

    public function lastUrl()
    {
       
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * Permet d'uploader une image sur son serveur
     *
     * @param string $name Nom du champ
     * @param string $destination Dossier de destination
     * @param array $ext Tableau d'extension acceptée
     * @return void
     */

    public function loaderFiles(string $name, string $destination, array $ext)
    {
        $file_name = $_FILES[$name]['name'];
        $file_extension = strrchr($file_name, '.');
        $file_tmp = $_FILES[$name]['tmp_name'];
        $file_dest = $destination.$file_name;

        if (in_array($file_extension, $ext)) {
            if (move_uploaded_file($file_tmp, $file_dest)) {
               return $file_dest;
            }
        }
    }

    /**
     * Permet d'afficher les erreurs
     *
     * @param string $name Le nom de la session
     * @param string $key  Le champ
     * @param string $value Le message a afficher
     * @return void
     */

    public function errors(string $name, string $key, string $value)
    {
        $errors = [];
        $errors[$key][] = $value;
        $this->session('errors', $errors);
        header('Location: ' . $this->lastUrl());
    }

    /**
     * Permet la création et/ou l'affection d'une variable session.
     *
     * @param string $name Le nom de la session
     * @param [type] $data Le donnée de la session
     * @return array
     */
    public function session(string $name, $data = null)
    {
        if ($data !== null) {
            $_SESSION[$name] = $data;
        } else {
            return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
        }
    }

    /**
     * Permet de verifier le remplissage correct des champs lors de la soumission d'un formulaire
     *
     * @param array $rules
     * @return array
     */

    public function validator(array $rules)
    {
        foreach ($rules as $key => $valueArray) {
            if (array_key_exists($key, $this->post)) {
                foreach ($valueArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($key, $this->post[$key]);
                            break;
                        case substr($rule, 0, 3) === "max":
                            $this->max($key, $this->post[$key], $rule);
                            break;
                        case substr($rule, 0, 3) === "min":
                            $this->min($key, $this->post[$key], $rule);
                            break;
                    }
                $this->session('input', $this->post);
                }
            }
        }

        if ($this->getErrors() !== null) {
            header('Location: ' . $this->lastUrl());
        } else {
            unset($_SESSION['errors']);
            unset($_SESSION['input']);
            return $this->name();
        }
    }

    /**
     * Vérifie si  les champs ont été remplis
     *
     * @param [type] $name Nom du champ
     * @param [type] $value Valeur rentrée dans le champ
     * @return void
     */

    private function required($name, $value)
    {
        $value = trim($value);
        if (!isset($value) || empty($value) || is_null($value)) {
            $this->errors[$name][] = ucfirst($name)." is required";
        }
    }

    /**
     * Vérifie si le nombre de caractères entrés correspond à la règle
     *
     * @param [type] $name
     * @param [type] $value
     * @param [type] $rule
     * @return void
     */

    private function max($name, $value, $rule)
    {
        preg_match_all("#([\d]+)#", $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) > $limit) {
            $this->errors[$name][] = ucfirst($name)." must contain a number of character less than or equal to $limit";
        }
    }

    /**
     * Vérifie si le nombre de caractères entrés correspond à la règle
     *
     * @param [type] $name
     * @param [type] $value
     * @param [type] $rule
     * @return void
     */

    private function min($name, $value, $rule)
    {
        preg_match_all("#([\d])#", $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            $this->errors[$name][] = ucfirst($name)." must contain a number of character greater than or equal to $limit";
        }
    }

    /**
     * Renvoie les erreurs
     *
     * @return void
     */
    public function getErrors()
    {
        if (!empty($this->errors)) {
            $this->session('errors', $this->errors);
            return ($this->session('errors', $this->errors) !== null) ? $this->session('errors', $this->errors) : [];
        } else {
            return ($this->session('errors', $this->errors) !== null) ? null : [];
        }
    }
}
