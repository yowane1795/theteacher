<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../vendor/autoload.php";

// Déclaration des constantes pour l'accès à nos différents fichiers.

define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('VIEWS', dirname(__DIR__).DIRECTORY_SEPARATOR.'ressources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR);

// Déclaration des constantes pour la connexion à la base de donnée.
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'lenseignant');
define('DB_USER', 'root');
define('DB_PASS', '');

Visitor::addVisitor();

try {
    Route::run();
} catch (\Exception $e) {
    return header("Location: /");
}