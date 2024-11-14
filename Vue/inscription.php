<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="index.php?action=inscription">
        <label for="login">Login</label><br>
        <input type="text" name="login" class="login"><br>

        <label for="nom">Nom</label><br>
        <input type="text" name="nom" id="nom"><br>

        <label for="prenom">Prenom</label><br>
        <input type="text" name="prenom" id="prenom"><br>

        <label for="motdepasse">Mot de passe</label><br>
        <input type="password" name="password" class="password"><br>
        <input type="submit">

        <?php if(isset($message)) { echo $message; } ?>
    </form>
</body>
</html>