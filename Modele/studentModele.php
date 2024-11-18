<?php
function connect_db()
{
    $db = new PDO('mysql:host=localhost;dbname=miniprojetphp;port=3306;charset=utf8','root','');
    return $db;
}

function handleLogin($tab)
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT id_utilisateurs, login, motdepasse, prenom, nom, photo FROM utilisateurs WHERE login = :login");

    $query->bindParam(':login', $tab['login'], PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si un utilisateur est trouvé et comparer les mdp
    if ($user && password_verify($tab['mot_de_passe'], $user['mot_de_passe'])) {
        // Déclaration des variables de sessions utiles pour la suite
        $_SESSION['user'] = $user['login'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['user_id'] = $user['id_utilisateurs'];
        $_SESSION['photo'] = $user['photo'];

        return true;
    } else {
        return false;
    }
}