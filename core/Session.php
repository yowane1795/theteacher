<?php

class Session
{

    /**
     * Renvoie les erreurs repérées lors du remplissage d'un champ précis dans un formulaire
     *
     * @param string $field Nom du champ
     * @return void
     */

    public static function errors(string $field)
    {
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        $dataErrors = [];

        if (!empty($errors)) {
            foreach ($errors as $key => $value) {
                $dataErrors = array_merge_recursive($dataErrors, [$key => implode(" and ", $value)]);
            }
            return array_key_exists($field, $dataErrors) ? $dataErrors[$field] : null;
        }
    }

    /**
     * Permet de détruire des variables de session
     *
     * @param array $name Tableau contenant les nom des variables
     * @return void
     */

    public static function destroy(array $names)
    {
        foreach ($names as $key => $value) {
            if (isset($_SESSION[$names[$key]])) {
                unset($_SESSION[$names[$key]]);
            }
            $key++;
        } 
    }

    /**
     * Permet de garder en session les données en voyer en POST
     *
     * @param string $field Nom de la session
     * @return void
     */

    public static function success(string $field)
    {
        if (isset($_SESSION['input'])) {
            $success = $_SESSION['input'];
            if (!isset($_SESSION['errors'][$field]) && !empty($_SESSION['errors'][$field])) {
                return $success[$field];
            } else {
                return "";
            }
        }
    }

    /**
     * Permet de verifier l'existence d'une variable de session
     *
     * @param string $name
     * @return array
     */
    public static function isset(string $name)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    public static function verifyUrl()
    {
        unset($_GET['url']);
        $url = $_GET;
        if (isset($url) && !empty($url)) {
            foreach ($url as $key => $value) {
                return true;
            }
        }
    }

    public static function flash(string $action)
    {
        if (self::isset('success') === null) {
            unset($_GET['url']);
            foreach ($_GET as $key => $value) {
                if (array_key_exists($key, $_GET)) {
                    $_SESSION[$key] = $action;
                    return  $_SESSION[$key];
                }
            }
        } 
    }
}
