<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/backOffice.css">
    <link rel="stylesheet" href="./Style/notes.css">
    <script src="./Javascript/backOffice.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <title>Back Office</title>
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
                    <li><a href="#">Absences et retards</a></li>
                </ul>
            </li>

            <li><a href="#" class="navbar-item"><i class="fa-solid fa-calendar-days"></i>Planning et réservation</a>
                <ul class="submenu">
                    <li><a href="index.php?action=emploiDuTemps&week=0">Emploi du temps</a></li>
                    <li><a href="#">Réservation salles et matériels</a></li>
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-school"></i>Vie étudiante</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                    <li><a href="#">Événements</a></li>
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
            <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
        </ul>


        <div class="profilandexit">
            <a href="./index.php?action=profil" class="navbar-profile">
                <?php echo " <span>Bienvenue {$_SESSION['prenom']}</span>" ?>
                <div class="profile-circle"></div>
            </a>
            <button id="openPopup" aria-label="Se déconnecter"><i class="fa-solid fa-right-from-bracket"></i></button>

        </div>

        <!-- POP PUP DE DECONNECCTION -->

        <div id="popup" class="popup">
            <div class="popup-content">
                <button class="closepopup" aria-label="Femrer la popup">X</button>
                <p>Se déconnecter de votre session</p>
                <a href="./index.php?action='logout'" class="popupButtondeco">Se déconnecter</a>
            </div>
        </div>

        <!-- Barre de navigation version téléphone -->

        <div class="side-menu" id="sideMenu">
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Accueil</a></li>

                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-graduation-cap"></i>Mon suivi</a>
                    <ul class="submenu">
                        <li><a href="#">Notes</a></li>
                        <li><a href="./index.php?action=todoListPage">To do list</a></li>
                        <li><a href="#">Absences et retards</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-calendar-days"></i>Planning et réservation</a>
                    <ul class="submenu">
                        <li><a href="index.php?action=emploiDuTemps&week=0">Emploi du temps</a></li>
                        <li><a href="#">Réservation salles et matériels</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-school"></i>Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                        <li><a href="#">Événements</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
                <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
            </ul>
        </div>
    </nav>


    <!-- Fil ariane -->
    <div class="upper-page-container">
        <div class="left-side"><a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">>
                Backoffice</span></div>
        <div class="right-side">
            <h1 id="notes">Backoffice</h1>
        </div>
    </div>

    <!-- FILTRES -->
    <div class="backoffice-container">
        <div class="filterbar-backoffice">
            <ul class="filters">
                <li><span class="ftr">Notes</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Todolist</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Absences</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Utilisateurs</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Messagerie</span></li>
            </ul>
        </div>
    </div>

    <!------------------------ FAIRE EN SORTE QUE LE BACKFOFFICE MARCHE EN FONCTION DE L'ELEVE QU'ON CHOISIT  ------------------------>
    <!------------------------ FAIRE EN SORTE QUE LE BACKFOFFICE MARCHE EN FONCTION DE L'ELEVE QU'ON CHOISIT  ------------------------>
    <!------------------------ FAIRE EN SORTE QUE LE BACKFOFFICE MARCHE EN FONCTION DE L'ELEVE QU'ON CHOISIT  ------------------------>
    <!------------------------ FAIRE EN SORTE QUE LE BACKFOFFICE MARCHE EN FONCTION DE L'ELEVE QU'ON CHOISIT  ------------------------>

    <!-- ADMINISTRATION NOTES -->
    <div class="notes-container" style="padding: 0 4rem 4rem 4rem">
        <div class="average-container">
            <?php $average = showAverage($_SESSION['id_utilisateur']) ?>
            <span><?= "Moyenne : " . " " . $average . "/20" ?></span>
        </div>

        <div class="notes-wrapper">
            <div class="notes-title">
                <p>Matières</p>
                <p>Professeur</p>
                <p>Note</p>
                <p>Moyenne de classe</p>
                <p>Date</p>
            </div>
            <?php $noteEleves = showNotes($_SESSION['id_utilisateur']); ?>
            <form action="./index.php?action=modifyNotes" method="POST">
                <?php foreach ($noteEleves as $note): ?>
                    <div class="notes-contenu">
                        <label class="hideLabel" for="matiere"></label>
                        <input type="text" name="matiere" id="matiere" value="<?= htmlspecialchars($note['matiere']) ?>">

                        <label class="hideLabel" for="professeur"></label>
                        <input type="text" name="professeur" id="professeur"
                            value="<?= htmlspecialchars($note['professeur']) ?>">

                        <label for="note" class="hideLabel"></label>
                        <input type="text" name="note" id="note" value="<?= htmlspecialchars($note['note']) ?>">

                        <label for="moyenne_classe" class="hideLabel"></label>
                        <input type="text" name="moyenne_classe" id="moyenne_classe"
                            value="<?= htmlspecialchars($note['moyenne_classe']) ?>">

                        <label for="date_attributation" class="hideLabel"></label>
                        <input type="date" name="date_attribution" id="date_attribution"
                            value="<?= htmlspecialchars($note['date_attribution']) ?>">
                    </div>
                <?php endforeach; ?>
                <div class="btn-container">
                    <input type="submit" style="padding: .8rem 1.5rem" class="backoffice-btn">
                </div>
            </form>

        </div>
    </div>
</body>

</html>