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
                // Include la page d'accueil
            } else {
                $error = 'Identifiants invalides';
                include('/ENT/Vue/accueil.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    default :
        include('./Vue/login.php');
        break;
}