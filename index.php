<?php
session_start();

// Appel des deux modèles qui contiennent les fonctions
require_once('./Modele/studentModele.php');
require_once('./Modele/teacherModele.php');

// Vérification que "action" est présent dans l'URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Switch Case pour procéder avec un modèle MVC
switch ($action) {
    case 'inscription' :
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $message = inscription($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['motdepasse'], $_POST['motdepasse2']);
            include('./Vue/login.php');
        }
        break;

    case 'login' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginSuccessful = handleLogin($_POST);
            if ($loginSuccessful) {
                // Include la page d'accueil
            } else {
                $error = 'Identifiants invalides';
                include('./Vue/login.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;
       
}