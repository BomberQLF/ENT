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
                include('./Vue/login.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'logout':
        // on détruit la session et on redirige l'utilisateur vers la page d'accueil
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
        break;

    case 'menuCrous':
        isLoggedIn() ? include('./Vue/menuCrous.php') : include('./Vue/login.php');
        break;

    case 'accueil':
        isLoggedIn() ? include('./Vue/accueil.php') : include('./Vue/login.php');
        break;

    case 'todoListPage':
        isLoggedIn() ? include('./Vue/todoList.php') : include('./Vue/login.php');
        break;

    case 'emploiDuTemps':
        if (isLoggedIn()) {
            require_once('./Modele/emploiDuTempsModele.php');
            // Obtenir la semaine actuelle
            $currentWeek = isset($_GET['week']) ? (int) $_GET['week'] : 0;

            // Récupérer les événements de l'emploi du temps
            $events = getEmploiDuTemps($currentWeek);
            include('./Vue/emploiDuTemps.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'add-task':
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $date_tache = $_POST['date_tache'] ?? null;
                $titre = $_POST['titre'] ?? null;
                $description = $_POST['description'] ?? null;
                $etat_tache = $_POST['etat_tache'] ?? 0;
                $id_utilisateur = $_POST['id_utilisateur'] ?? null;

                if ($date_tache && $titre && $description && $id_utilisateur) {
                    $taskAdded = addTask($date_tache, $titre, $description, $etat_tache, $id_utilisateur);
                    if ($taskAdded) {
                        include('./Vue/todoList.php');
                    } else {
                        echo "Erreur lors de l'ajout de la tâche.";
                    }
                } else {
                    echo "Tous les champs sont requis.";
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

    case 'update-task-state':
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_tache = $_POST['id_tache'];
                // Si la checkbox est cochée, on envoie 1, sinon 0
                $etat_tache = isset($_POST['etat_tache']) ? 1 : 0;

                // Appelle la fonction du modèle pour mettre à jour l'état
                $taskUpdated = updateTaskState($id_tache, $etat_tache);

                if ($taskUpdated) {
                    include('./Vue/todoList.php');
                    exit;
                }
            }
        }
        break;

    case 'deleteTask':
        if (isLoggedIn()) {
            $id_tache = $_GET['id'];
            if ($id_tache) {
                deleteTask($id_tache);
                include('./Vue/todoList.php');
            }
        }
        break;
    case 'profil':
        if (isLoggedIn()) {
            include('./Vue/profil.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    default:
        include('./Vue/login.php');
        break;
}