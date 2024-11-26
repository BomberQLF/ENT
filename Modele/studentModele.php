<?php
function connect_db()
{
    $db = new PDO('mysql:host=localhost;dbname=ent;port=8888', 'root', 'root');
    return $db;
}

function handleLogin($tab)
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