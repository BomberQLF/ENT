<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php?action=login">
        <label for="login">Login</label><br>
        <input type="text" name="login" class="login"><br>

        <label for="motdepasse">Mot de passe</label><br>
        <input type="password" name="motdepasse" class="motdepasse">
        <input type="submit">

        <?php if(isset($error)) { echo $error; } ?>
    </form>
</body>
</html>