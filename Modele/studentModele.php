<?php
function connect_db(): PDO
{
    $db = new PDO('mysql:host=localhost;dbname=ent;', 'root', 'root');
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
        $_SESSION['photo_profil'] = $user['photo_profil'];
        $_SESSION['tp'] = $user['tp'];
        $_SESSION['role'] = $user['admin'];
        $_SESSION['telephone'] = $user['telephone'];

        return true;
    } else {
        return false;
    }
}

function isLoggedIn(): bool
{
    return isset($_SESSION['login']);
}

function isAdmin(): bool 
{
    return isLoggedIn() && $_SESSION['role'] == 1;
}

function addTask($date_tache, $titre, $description, $etat_tache, $id_utilisateur): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare(
        "INSERT INTO taches (date_tache, titre, description, etat_tache, id_utilisateur) 
        VALUES (:date_tache, :titre, :description, :etat_tache, :id_utilisateur)"
    );

    $query->bindParam(":date_tache", $date_tache);
    $query->bindParam(":titre", $titre);
    $query->bindParam(":description", $description);
    $query->bindParam(":etat_tache", $etat_tache, PDO::PARAM_INT);
    $query->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);

    return $query->execute();
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

function updateTaskState($id_tache, $etat_tache): bool
{
    $pdo = connect_db();

    $stmt = $pdo->prepare('UPDATE taches SET etat_tache = :etat_tache WHERE id_tache = :id_tache');
    $stmt->bindParam(':etat_tache', $etat_tache, PDO::PARAM_INT);
    $stmt->bindParam(':id_tache', $id_tache, PDO::PARAM_INT);

    return $stmt->execute();
}

function deleteTask($id_tache): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare("DELETE FROM taches WHERE id_tache = :id_tache");
    $query->bindParam(":id_tache", $id_tache, PDO::PARAM_INT);
    $deleteReussi = $query->execute();
    return $deleteReussi;
}

function modifUser($nom, $telephone, $login, $id_utilisateur) {
    $pdo = connect_db();

    $requete = $pdo->prepare("UPDATE utilisateurs SET nom = :nom, login = :login, telephone = :telephone WHERE id_utilisateur = :id_utilisateur");

    $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requete->bindParam(':login', $login, PDO::PARAM_STR);
    $requete->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $requete->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $requete->execute();

    $_SESSION['nom'] = $nom;
    $_SESSION['login'] = $login;
    $_SESSION['telephone'] = $telephone;
}
function updateUserPhoto($login, $target_file)
{
    $db = connect_db();
    $stmt = $db->prepare("UPDATE utilisateurs SET photo_profil = :photo_profil WHERE id_utilisateur = :id_utilisateur");
    $stmt->bindParam(':photo_profil', $target_file, PDO::PARAM_STR);
    $stmt->bindParam(':id_utilisateur', $login, PDO::PARAM_INT);
    $stmt->execute();

    $_SESSION['photo_profil'] = $target_file;
}

function showNotes($id_utilisateur, $orderBy = 'matiere')
{
    $pdo = connect_db();
    if ($orderBy === 'date_attribution') {
        $orderDirection = 'DESC';
    } else {
        $orderDirection = 'ASC';
    }

    $query = $pdo->prepare("SELECT * FROM notes WHERE id_utilisateur = :id_utilisateur ORDER BY $orderBy $orderDirection");
    $query->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    $notes = $query->fetchAll(PDO::FETCH_ASSOC);

    return $notes;
}
function showNotesaccueil($id_utilisateur)
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM notes WHERE id_utilisateur = :id_utilisateur ORDER BY date_attribution DESC LIMIT 3");
    $query->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    $notes = $query->fetchAll(PDO::FETCH_ASSOC);
    return $notes;
}

function showAverage($id_utilisateur)
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT note FROM notes WHERE id_utilisateur = :id_utilisateur");
    $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);
    $query->execute();
    $notes = $query->fetchAll(PDO::FETCH_ASSOC);

    $average = array_sum(array_column($notes, 'note')) / count($notes);
    return $average;
}

// FONCTION POUR LES ABSENCES ET LES RETARDS ==============================================
function getabsences($id_utilisateur)
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM absences_retards WHERE id_utilisateur = :id_utilisateur AND absence = 1 ORDER BY date DESC");
    $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    $absences = $query->fetchAll(PDO::FETCH_ASSOC);
    return $absences;
}
function getretards($id_utilisateur)
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM absences_retards WHERE id_utilisateur = :id_utilisateur AND absence = 0 ORDER BY date DESC");
    $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    $retards = $query->fetchAll(PDO::FETCH_ASSOC);
    return $retards;

}
function getSelectedAbsencesRetards($ids) {
    $pdo = connect_db();
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $query = "SELECT * FROM absences_retards WHERE id_absence_retard IN ($placeholders)";
    $stmt = $pdo->prepare($query);
    $stmt->execute($ids);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function updateAbsencesRetardsStatus($ids, $filePath) {
    $pdo = connect_db();
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $query = "UPDATE absences_retards SET statut = 'justifiée', fichier_justification = ? WHERE id_absence_retard IN ($placeholders)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array_merge([$filePath], $ids));
}

function showUsers(): array 
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM utilisateurs");
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}
function deleteUsers($id_utilisateur): void
{
    $pdo = connect_db();
    $query = $pdo->prepare('DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur');
    $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
}
function userBackOffice($id_utilisateur, $nom, $prenom, $login, $telephone, $tp, $admin) {
    $pdo = connect_db();

    $requete = $pdo->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, login = :login, telephone = :telephone, tp = :tp, admin = :admin WHERE id_utilisateur = :id_utilisateur");

    $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requete->bindParam(':login', $login, PDO::PARAM_STR);
    $requete->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $requete->bindParam(':tp', $tp, PDO::PARAM_STR);
    $requete->bindParam(':admin', $admin, PDO::PARAM_INT);
    $requete->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

    return $requete->execute();
}