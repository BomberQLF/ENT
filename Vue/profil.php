<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/profil.css">
</head>

<body>
    <nav>
        <a href="#header-website" class="skip-link">Aller au contenu</a>

        <a href="./index.php?action=accueil" class="navbar-home" aria-label="menu"><i class="fa-solid fa-house"></i></a>
        <button class="hamburger" id="hamburger" aria-label="menu de sélection">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Barre de navigation d'origine -->

        <ul id="navbarLinks">
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-graduation-cap"></i>Mon suivi</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=notesPage">Notes</a></li>
                    <li><a href="./index.php?action=todoListPage">To do list</a></li>
                    <li><a href="./index.php?action=absence">Absences et retards</a></li>
                </ul>
            </li>

            <li><a href="./index.php?action=emploiDuTemps&week=0" class="navbar-item"><i
                        class="fa-solid fa-calendar-days"></i>Emploi du temps</a>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-school"></i>Vie étudiante</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                    <li><a href="./index.php?action=evenement">Événements</a></li>
                </ul>
            </li>
            <?php if (isAdmin()): ?>
                <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
            <?php endif; ?>
        </ul>


        <div class="profilandexit">
            <a href="./index.php?action=profil" class="navbar-profile">
                <?php echo " <span>Bienvenue {$_SESSION['prenom']}</span>
                <div class='profile-circle'>
                <img src='{$_SESSION['photo_profil']}' alt='photo de profil' class='photoprofil'>
                </div>" ?>
            </a>
            <button id="openPopup" aria-label="Se déconnecter"><i class="fa-solid fa-right-from-bracket"></i></button>

        </div>

        <!-- POP PUP DE DECONNECCTION -->

        <div id="popup" class="popup">
            <div class="popup-content">
                <button class="closepopup" aria-label="Femrer la popup">X</button>
                <p>Se déconnecter de votre session</p>
                <a href="./index.php?action=logout" class="popupButtondeco">Se déconnecter</a>
            </div>
        </div>

        <div id="popupimgfichier" class="popupimgfichier">
            <div class="popupimgfichier-content">
                <button class="closepopupimgfichier" aria-label="Femrer la popup">X</button>
                <i class="fa-solid fa-file-arrow-up"></i>
                <p>Joindre votre image ci-dessous</p>
                <p>format acceptés:SVG,JPG,PNG</p>
                <form action="index.php?action=upload_Photo" method="POST" enctype="multipart/form-data">
                    <label for="photo_profil"></label>
                    <input type="file" name="photo_profil" id="photo_profil" required>
                    <input type="submit" name="submit" class="popupimgfichierdeco" value="Sauvergarder">
                </form>
            </div>
        </div>

        <!-- Barre de navigation version téléphone -->

        <div class="side-menu" id="sideMenu">
            <ul>
                <li><a href="./index.php?action=accueil"><i class="fa-solid fa-house"></i>Accueil</a></li>

                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-graduation-cap"></i>Mon suivi</a>
                    <ul class="submenu">
                        <li><a href="./index.php?action=notesPage">Notes</a></li>
                        <li><a href="./index.php?action=todoListPage">To do list</a></li>
                        <li><a href="./index.php?action=absence">Absences et retards</a></li>
                    </ul>
                </li>

                <li>
                    <a href="./index.php?action=emploiDuTemps&week=0"><i class="fa-solid fa-calendar-days"></i>Emploi du
                        temps</a>
                </li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-school"></i>Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                        <li><a href="./index.php?action=evenement">Événements</a></li>
                    </ul>
                </li>
                <?php if (isAdmin()): ?>
                    <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
                <?php endif; ?>
            </ul>
        </div>

    </nav>

    <div class="upper-page-container">
        <div class="left-side">
            <a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">> Mon profil</span>
        </div>
        <div class="right-side">
            <h1 id="profil">Mon profil</h1>
        </div>
    </div>

    <?php if (isset($_SESSION['modifusermsg'])) {
        echo "<p class='billetmessage'>{$_SESSION['modifusermsg']}</p>";
        unset($_SESSION['modifusermsg']); // Supprime le message après affichage
    } ?>

    <section class="profil">
        <div class="Profil-content">
            <div class="profil-content-gauche">
                <div class="overlap-group">
                    <?php echo "<img src='{$_SESSION['photo_profil']}' alt='Photo de profil' class='photoprofil'>"; ?>
                    <button class="group" id='openPopupimgfichier'><i class="fa-solid fa-pencil"></i></button>
                </div>
                <div class="profil-text">
                    <?php
                    echo "<h2>Bienvenue, <br> {$_SESSION['prenom']} {$_SESSION['nom']} </h2>
                    <p><i class='fa-solid fa-user'></i>- Iut marne la valée</p>
                    <p><i class='fa-solid fa-school'></i>- Étudiante en BUT MMI 2 - TP{$_SESSION['tp']}</p> ";
                    ?>
                </div>
            </div>
            <div class="divformdroite">
                <form action="index.php?action=updateuser" method="POST">
                    <div class="form-container-profil" id="formprofil">
                        <div class="divinput">
                            <div class="row">
                                <label for="nom">Votre nom</label>
                                <input id="nom" name="nom" type="text" placeholder="Votre Nom" disabled
                                    value="<?php echo $_SESSION['nom'] ?>" required>
                            </div>
                            <div class="row">
                                <label for="telephone">Téléphone</label>
                                <input id="telephone" name="telephone" type="text" placeholder="Téléphone" disabled
                                    value="<?php echo $_SESSION['telephone'] ?>" required>
                            </div>
                        </div>
                        <div class="divinput">
                            <div class="row">
                                <label for="login">Email</label>
                                <input id="login" name="login" type="email" placeholder="Email" disabled
                                    value="<?php echo $_SESSION['login'] ?>" required>
                            </div>
                            <div class="row">
                                <label for="password">Mot de passe</label>
                                <input id="password" type="password" placeholder="********" disabled>
                                <button id="passwordButton" class="passwordchange">Changer le mot de passe</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-container-profilmotdepasse" id="changemotdepasseform">
                        <div class="divinput">
                            <div class="row">
                                <label for="oldPassword">Votre ancien mot de passe</label>
                                <input id="oldPassword" name="oldPassword" type="password"
                                    placeholder="ancien mot de passe">
                            </div>
                            <div class="row">
                                <label for="newPassword">Réécrivez votre nouveau mot de passe</label>
                                <input id="newPassword" type="password" placeholder="nouveau mot de passe">
                            </div>
                        </div>
                        <div class="divinput">
                            <div class="row">
                                <label for="confirmPassword">Votre nouveau mot de passe</label>
                                <input id="confirmPassword" type="password" placeholder="confirmer le mot de passe">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="submit-boutton-input" value="Enregistrer les modifications">
                </form>
                <button class="submit-boutton" id="editProfileButton">Modifier votre profil</button>
            </div>
        </div>
    </section>
    <script src="./Javascript/index.js"></script>
    <script src="./Javascript/profil.js"></script>
</body>

</html>