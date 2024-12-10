<?php
function connect_db(): PDO
{
    $db = new PDO('mysql:host=localhost;dbname=ent;', 'root', '');
    return $db;
}

function handleLogin($tab): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login");

    $query->bindParam(':login', $tab['login'], PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si un utilisateur est trouvé et comparer les mdp
    if ($user && password_verify($tab['mot_de_passe'], $user['mot_de_passe'])) {
        // Déclaration des variables de sessions utiles pour la suite
        $_SESSION['login'] = $user['login'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
        $_SESSION['photo'] = $user['photo_profil'];
        $_SESSION['tp'] = $user['tp'];
        $_SESSION['role'] = $user['admin'];

        return true;
    } else {
        return false;
    }
}

function isLoggedIn(): bool
{
    return isset($_SESSION['login']);
}

function addTask($date_tache, $titre, $description, $id_utilisateur): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare("INSERT INTO taches (id_tache, date_tache, titre, description, id_utilisateur) VALUES (NULL, :date_tache, :titre, :description, :id_utilisateur)");
    $query->bindParam(":date_tache", $date_tache, PDO::PARAM_STR);
    $query->bindParam(":titre", $titre, PDO::PARAM_STR);
    $query->bindParam(":description", $description, pdo::PARAM_STR);
    $query->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_STR);
    $ajoutReussi = $query->execute();

    return $ajoutReussi;
}

function showTasks(): array
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM taches");
    $query->execute();
    $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function updateTask($date_tache, $titre, $description, $id_tache): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare("UPDATE taches SET date_tache = :date_tache ,titre = :titre, description = :description WHERE id_tache = :id_tache");
    $query->bindParam(":date_tache", $date_tache, PDO::PARAM_STR);
    $query->bindParam(":titre", $titre, PDO::PARAM_STR);
    $query->bindParam(":description", $description, PDO::PARAM_STR);
    $query->bindParam(":id_tache", $id_tache, PDO::PARAM_STR);
    $updateReussi = $query->execute();

    return $updateReussi;
}