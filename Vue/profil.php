<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="stylesheet" href="./Style/navbar.css">
    <style>
        .page-content {
            display: flex;
            gap: 7rem;
        }

        .suivi {
            text-decoration: none;
            color: #7a7a7a;
        }

        .upper-page-container {
            display: flex;
            justify-content: space-between;
            padding: 2rem 0 1rem 4rem;
        }

        #profil {
            text-transform: uppercase;
            font-size: 1.2rem;
            color: white;
        }

        .right-side {
            padding: 0.4rem 3rem;
            background-color: #3e567e;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .profil-container {
            background-color: blue;
            height: 100vh;
        }

    </style>
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
                    <li><a href="#">Notes</a></li>
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

    <!-- section profil -->
    <section class="profil-container">
        <div class="profil-section">
            <div><img src="./image/uploads/photo_default.png" alt=""></div>
            <div>
                <h2>Bienvenue, prenom nom</h2>
                <p><i class="fa-solid fa-school"></i> - IUT Marne la Valée</p>
                <p><i class="fa-solid fa-user"></i> - étudiante en BUT MMI 2 - TPB</p>
            </div>

        </div>


        <div class="profil-img"><img src="./image/uploads/photo_default.png" alt=""></div>
        <div class="profil-info-gauche">
            <h2>Bienvenue, prenom nom</h2>
            <p><i class="fa-solid fa-school"></i> - IUT Marne la Valée</p>
            <p><i class="fa-solid fa-user"></i> - étudiante en BUT MMI 2 - TPB</p>
        </div>

    </section>

    <script src="./Javascript/index.js"></script>
</body>

</html>