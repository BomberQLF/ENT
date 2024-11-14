<?php
function connect_db()
{
    $db = new PDO('mysql:host=localhost;dbname=miniprojetphp;port=3306;charset=utf8','root','');
    return $db;
}

function register($nom, $prenom, $login, $motdepasse, $motdepasse2)
{
    // On regarde si les mots de passe correspondent bien
    if ($motdepasse !== $motdepasse2) {
        return "Les mots de passe ne correspondent pas";
    }
    $db = connect_db();
    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();

    // On regarde si le login est déjà pris
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        return "Login déjà pris";
    } else {
        $requete = "INSERT INTO utilisateurs VALUES (NULL, :login, :nom, :prenom, :motdepasse, :photo, 0)";
        $stmt = $db->prepare($requete);

        // on met l'url de la photo par défaut
        $photo = "images/uploads/profil_default.png";
        $hash = password_hash($motdepasse, PASSWORD_DEFAULT);

        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':motdepasse', $hash, PDO::PARAM_STR);
        $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
        $stmt->execute();
        return "Inscription réussie. Vous pouvez vous connecter";
    }
}
function login($login)
{
    $db = connect_db();
    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


























?>