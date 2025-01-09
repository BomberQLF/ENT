<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/login.css">
    <title>Login - ENT</title>
</head>

<body class="login-body">
    <div class="login-container">
        <div class="choice-login-container">
            <h1>Bienvenue sur l'ENT Gustave Eiffel</h1>
        </div>
        <div class="form-login-container">
            <form action="/ENT/index.php?action=login" method="POST">
                <h2 id="connecter-login">Se connecter</h2>

                <label for="login">Login</label>
                <input type="text" name="login" class="login" placeholder="Tapez votre login" required>
                <div class="mdp-container">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="mot_de_passe" placeholder="Tapez votre mot de passe" required>
                </div>

                <a href="#">Mot de passe oublié ?</a>
                <input type="submit" value="Se connecter">

                <?php if (isset($error)) {
                    echo $error;
                } ?>
            </form>
        </div>
    </div>
</body>

</html>