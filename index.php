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
        $_SESSION = array();
        session_destroy();
        include('./Vue/login.php');
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

    case 'update-task-stateBo':
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_tache = $_POST['id_tache'];
                $etat_tache = isset($_POST['etat_tache']) ? 1 : 0;

                $taskModified = updateTask($_POST['date_tache'], $_POST['titre'], $_POST['description'], $id_tache);

                $taskUpdated = updateTaskState($id_tache, $etat_tache);

                include('./Vue/backOffice.php');
                exit;
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'addTaskBo':
        if (isset($_POST['id_utilisateur'], $_POST['date_tache'], $_POST['titre'], $_POST['description'])) {
            $id_utilisateur = intval($_POST['id_utilisateur']);
            $date_tache = htmlspecialchars($_POST['date_tache']);
            $titre = htmlspecialchars($_POST['titre']);
            $description = htmlspecialchars($_POST['description']);

            // Appeler la fonction d'ajout
            $result = addTask($date_tache, $titre, $description, 0, $id_utilisateur);

            if ($result) {
                // Redirection vers le backoffice
                include('./Vue/backOffice.php');
                exit;
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
                $etat_tache = isset($_POST['etat_tache']) ? 1 : 0;

                $taskModified = updateTask($_POST['date_tache'], $_POST['titre'], $_POST['description'], $id_tache);

                $taskUpdated = updateTaskState($id_tache, $etat_tache);

                include('./Vue/todoList.php');
                exit;
            }
        } else {
            include('./Vue/login.php');
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

    case 'boDeleteTask':
        if (isAdmin()) {
            $id_tache = $_GET['id'];
            if ($id_tache) {
                deleteTask($id_tache);
                include('./Vue/backOffice.php');
            }
        }
        break;


    case 'profil':
        if (isLoggedIn()) {
            handleLogin($_POST);
            include('./Vue/profil.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'updateuser':
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = $_POST['nom'];
                $login = $_POST['login'];
                $telephone = $_POST['telephone'];
                $id_utilisateur = $_SESSION['id_utilisateur'];
                modifUser($nom, $telephone, $login, $id_utilisateur);
                $_SESSION['modifusermsg'] = "Utilisateur $login a été modifié avec succès.";
                include('./Vue/profil.php');
            }
        }
        break;

    case 'notesPage':
        if (isLoggedIn()) {
            $orderBy = $_POST['orderBy'] ?? 'matiere';
            $notes = showNotes($_SESSION['id_utilisateur'], $orderBy);
            include('./Vue/notes.php');
        }
        break;

    case 'addNote':
        if (isAdmin()) {
            $id_utilisateur = $_POST['id_utilisateur'];
            $matiere = $_POST['matiere'];
            $professeur = $_POST['professeur'];
            $note = $_POST['note'];
            $moyenne_classe = $_POST['moyenne_classe'];
            $date_attribution = $_POST['date_attribution'];

            if ($id_utilisateur && $matiere && $professeur && $note && $moyenne_classe && $date_attribution) {
                addNote($id_utilisateur, $matiere, $professeur, $note, $moyenne_classe, $date_attribution);
            }
            header("Location: ./index.php?action=viewNotes&student=" . urlencode($_GET['student']));
            exit;
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'upload_Photo':
        if (isset($_FILES['photo_profil'])) {
            if (isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                // on récupère les informations de l'utilisateur connecté
                $user = isLoggedIn();

                // Si l'utilisateur est connecté
                if ($user) {
                    // On récupère l'id de l'utilisateur
                    // On créer le chemin du fichier dans lequel l'image sera uploader
                    $target_dir = "image/uploads/";
                    // On récupère l'extension du fichier
                    $imageFileType = strtolower(pathinfo($_FILES['photo_profil']['name'], PATHINFO_EXTENSION));
                    // On créer le chemin complet du fichier
                    $target_file = $target_dir . "profil_" . $user . "." . $imageFileType;
                    // On initialise la variable $uploadOk à 1
                    $uploadOk = 1;

                    // Limite la taille du fichier (1 Mo ici)
                    if ($_FILES['photo_profil']['size'] > 1000000) {
                        $_SESSION['modifusermsg'] = "Désolé, votre fichier est supérieur à 1Mo.";
                        $uploadOk = 0;
                    }

                    // Limite les formats de fichiers
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $_SESSION['modifusermsg'] = "Désolé, seul les formats JPG, JPEG, PNG & GIF sont autorisée.";
                        $uploadOk = 0;
                    }

                    // Supprimer l'ancien fichier s'il existe
                    if (file_exists($target_file)) {
                        // Supprime le fichier
                        unlink($target_file);
                    }

                    // Si tout est ok, uploade le fichier
                    if ($uploadOk && move_uploaded_file($_FILES['photo_profil']['tmp_name'], $target_file)) {
                        // On appelle la fonction updateUserPhoto pour mettre à jour la photo de profil de l'utilisateur
                        updateUserPhoto($user, $target_file);
                        $_SESSION['modifusermsg'] = "La photo de profil a été mise à jour avec succès.";

                    }
                }
            } else {
                $_SESSION['modifusermsg'] = "Vous devez être connectée pour uploader une photo de profil.";
            }
        }
        include('./Vue/profil.php');
        break;

    case 'backoffice':
        isAdmin() ? include('./Vue/backOffice.php') : include('./Vue/login.php');
        break;

    case 'modifyNotes':
        if (isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_note = intval($_POST['id_note']);
                $matiere = htmlspecialchars($_POST['matiere']);
                $note = htmlspecialchars($_POST['note']);
                $professeur = htmlspecialchars($_POST['professeur']);
                $moyenne_classe = htmlspecialchars($_POST['moyenne_classe']);
                $date_attribution = htmlspecialchars($_POST['date_attribution']);

                if (updateNotes($id_note, $matiere, $note, $professeur, $moyenne_classe, $date_attribution) === true) {
                    include('./Vue/backOffice.php');
                } else {
                    include('./Vue/backOffice.php');
                }
            } else {
                include('./Vue/login.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'deleteNote':
        if (isAdmin()) {
            $id_note = $_GET['id'];
            if ($id_note) {
                deleteNote($id_note);
            }
            include('./Vue/backOffice.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'viewTasks':
        if (isLoggedIn()) {
            $student = $_GET['student'] ?? null;
            if ($student) {
                $id_utilisateur = getUserIdByFirstName($student);
                if ($id_utilisateur) {
                    $tasks = showTasksByStudent($id_utilisateur);
                } else {
                    $tasks = [];
                }
            } else {
                $tasks = showTasks();
            }
            include('./Vue/backOffice.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'viewNotes':
        if (isLoggedIn()) {
            $student = $_GET['student'] ?? null;
            if ($student) {
                $id_utilisateur = getUserIdByFirstName($student);
                if ($id_utilisateur) {
                    $noteEleves = showNotesByStudent($id_utilisateur);
                } else {
                    $noteEleves = [];
                }
            } else {
                $noteEleves = showAllNotes();
            }
            include('./Vue/backOffice.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'evenement':
        if (isLoggedIn()) {
            include('./Vue/evenement.php');
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'modifyUserBo':
        if (isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_utilisateur = $_POST['id_utilisateur'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $login = $_POST['login'];
                $telephone = $_POST['telephone'];
                $tp = $_POST['tp'];
                $admin = $_POST['admin'];

                $userModified = userBackOffice($id_utilisateur, $nom, $prenom, $login, $telephone, $tp, $admin);

                if ($userModified) {
                    include('./Vue/backOffice.php');
                } else {
                    include('./Vue/login.php');
                }
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    case 'deleteUser':
        if (isAdmin()) {
            $id_utilisateur = $_GET['id'];
            if ($id_utilisateur) {
                deleteUsers($id_utilisateur);
                include('./Vue/backOffice.php');
            }
        } else {
            include('./Vue/login.php');
        }
        break;

    default:
        include('./Vue/login.php');
        break;
}