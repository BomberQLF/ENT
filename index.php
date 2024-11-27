<?php
session_start();

// Appel des deux modèles qui contiennent les fonctions
require_once('./Modele/studentModele.php');
require_once('./Modele/teacherModele.php');

// Vérification que "action" est présent dans l'URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Switch Case pour procéder avec un modèle MVC
switch ($action) {
    case 'login' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginSuccessful = handleLogin($_POST);
            if ($loginSuccessful) {
                include('./Vue/accueil.php');
            } else {
                $error = 'Identifiants invalides';
                var_dump($_POST);
                include('./Vue/login.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'menuCrous' :
        isLoggedIn() ? include('./Vue/menuCrous.php') : include('./Vue/login.php');
        break;

    case 'accueil' :
    isLoggedIn() ? include('./Vue/accueil.php') : include('./Vue/login.php');
    break;

    default :
        include('./Vue/login.php');
        break;
}