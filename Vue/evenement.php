<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement</title>
    <link rel="stylesheet" href="./style/navbar.css">
    <link rel="stylesheet" href="./style/evenement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <style>
        /* .evenement-content {
            background-color: blue;
            width: 100%;
            height: 100vh;
        }
        .searchbar-container {
            background-color: red;
        } */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .evenement-content {
            height: 60vh;
            width: 100%;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container {
            background-color: #496A9E;
            padding: 50px 50px 100px 50px;
            border-radius: 8px;
            text-align: center;
            color: white;
            max-width: 1200px;
            width: 100%;
        }

        .search-container h1 {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-align: start;
            font-weight: bold;
        }

        .search-container h2 {
            font-size: 1.5rem;
            margin-bottom: 50px;
            text-align: start;
            font-weight: bold;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-bar input {
            border: none;
            outline: none;
            flex: 1;
            padding: 20px;
            border-radius: 8px;
        }

        .search-bar .location {
            display: flex;
            align-items: center;
            padding: 10px;
            border-left: 1px solid #ddd;
            border-radius: 8px;
        }

        .fa-location-dot {
            margin-right: 5px;
            color: black;
        }

        .search-bar .dropdown {
            cursor: pointer;
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
                    <li><a href="./index.php?action=evenement">Événements</a></li>
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
            <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
        </ul>


        <div class="profilandexit">
            <a href="./index.php?action=profil" class="navbar-profile">
                <?php echo " <span>Bienvenue {$_SESSION['prenom']}</span>
                <div class='profile-circle'>
                <img src='{$_SESSION['photo_profil']}' alt='photo de profil' class='photoprofil'>
                
                </div>

                " ?>
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
                <li><a href="./index.php?action=accueil"><i class="fa-solid fa-house"></i>Accueil</a></li>

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
    <div class="upper-page-container">
        <div class="left-side">
            <a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">> Événements</span>
        </div>
    </div>

    <!-- <section class="evenement-content">
        <div class="searchbar-container">
            <h1>Ne ratez rien !</h1>
            <h2>Découvrez les événements de Gustave Eiffeil et ses partenaires !</h2>
        </div>
    </section> -->
    <section class="evenement-content">
        <div class="search-container">
            <h1>Ne ratez rien !</h1>
            <h2>Découvrez les événements de Gustave Eiffel et ses partenaires !</h2>
            <div class="search-bar">
                <input type="text" placeholder="Search Events, Categories, Location,...">
                <div class="location">
                    <i class="fa-solid fa-location-dot"></i>
                    <select name="ville" class="location" id="ville-select">
                        <i class="fa-solid fa-location-dot"></i>
                        <option value="Paris">Paris</option>
                        <option value="Nantes">Nantes</option>
                        <option value="Lyon">Lyon</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <script src="./Javascript/index.js"></script>
</body>

</html>