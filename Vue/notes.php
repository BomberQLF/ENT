<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/notes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <title>Notes</title>
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
            <?php if (isAdmin()): ?>
                <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
            <?php endif; ?>
        </ul>


        <div class="profilandexit">
            <a href="./index.php?action=profil" class="navbar-profile">
                <span>Bienvenue, Anastasia</span>
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
                <?php if (isAdmin()): ?>
                    <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- Fil ariane -->
    <div class="upper-page-container">
        <div class="left-side"><a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">>
                Notes</span></div>
        <div class="right-side">
            <h1 id="notes">Mes notes</h1>
        </div>
    </div>

    <div class="notes-container">
        <div class="notes-filterbar">
            <form method="POST" class="notes-tri">
                <div class="select-filter">
                    <label for="sort-select">Trier par :</label>
                    <select name="orderBy" id="sort-select" onchange="this.form.submit()">
                        <option value="date_attribution" <?= $orderBy === 'date_attribution' ? 'selected' : '' ?>>Plus
                            récent</option>
                        <option value="matiere" <?= $orderBy === 'matiere' ? 'selected' : '' ?>>Ordre Alphabétique</option>
                    </select>
                </div>
            </form>
        </div>

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
            <?php foreach ($noteEleves as $note): ?>
                <div class="notes-contenu">
                    <p style="width: 5rem;"><?= htmlspecialchars($note['matiere']) ?></p>
                    <p><?= htmlspecialchars($note['professeur']) ?></p>
                    <p><?= htmlspecialchars($note['note']) ?></p>
                    <p><?= htmlspecialchars($note['moyenne_classe']) ?></p>
                    <p><?= htmlspecialchars($note['date_attribution']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>