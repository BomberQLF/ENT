<?php
session_start();

// Appel des deux modèles qui contiennent les fonctions
require_once('./Modele/studentModele.php');
require_once('./Modele/teacherModele.php');

// Vérification que "action" est présent dans l'URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Switch Case pour procéder avec un modèle MVC
switch ($action) {
    case 'login':
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

    case 'menuCrous':
        isLoggedIn() ? include('./Vue/menuCrous.php') : include('./Vue/login.php');
        break;

    case 'accueil':
        if (isLoggedIn()) {
            require_once('./Modele/emploiDuTempsModele.php');
            // Obtenir la semaine actuelle
            $currentWeek = isset($_GET['week']) ? (int) $_GET['week'] : 0;

            // Récupérer les événements de l'emploi du temps
            $events = getEmploiDuTemps($currentWeek);
            include('./Vue/accueil.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'todoListPage':
        isLoggedIn() ? include('./Vue/todoList.php') : include('./Vue/login.php');
        break;

    case 'add-task':
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $taskAdded = addTask($_POST['date_tache'], $_POST['titre'], $_POST['description'], $_POST['id_utilisateur']);
                if ($taskAdded) {
                    include('./Vue/todoList.php');
                } else {
                    include('./Vue/login.php');
                }
            }
        }
        break;

    case 'modify-task':
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $taskModified = updateTask($_POST['date_tache'], $_POST['titre'], $_POST['description'], $_POST['id_tache']);
                if ($taskModified) {
                    $successMessage = "Votre tâche a été modifié avec succès !";
                    include('./Vue/todoList.php');
                } else {
                    include('./Vue/login.php');
                }
            } else {
                include('./Vue/login.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    default:
        include('./Vue/login.php');
        break;
}