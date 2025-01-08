<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement</title>
    <link rel="stylesheet" href="./style/navbar.css">
    <link rel="stylesheet" href="./style/evenement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
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
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-school"></i>Vie étudiante</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                    <li><a href="./index.php?action=evenement">Événements</a></li>
                </ul>
            </li>
            <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
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
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-school"></i>Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                        <li><a href="#">Événements</a></li>
                    </ul>
                </li>
                <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
            </ul>
        </div>

    </nav>
    <div id="mainPage">
        <div class="upper-page-container">
            <div class="left-side">
                <a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">> Événements</span>
            </div>
        </div>
        <section class="evenement-content" id="header-website">
            <div class="search-container">
                <h1>Ne ratez rien !</h1>
                <h2>Découvrez les événements de Gustave Eiffel et ses partenaires !</h2>
                <div class="search-bar">
                    <div class="location">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <label for="searchbar" aria-label="barre de recherche"></label>
                    <input type="text" name="searchbar" id="searchbar"
                        placeholder="Search Events, Categories, Location,...">
                    <div class="location">
                        <i class="fa-solid fa-location-dot"></i>
                        <label for="ville" aria-label="ville"></label>
                        <select name="ville" class="location" id="ville">
                            <i class="fa-solid fa-location-dot"></i>
                            <option value="Paris">Paris</option>
                            <option value="Nantes">Nantes</option>
                            <option value="Lyon">Lyon</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories-section">
            <div class="categories-container">
                <h3>Explorer les Catégories</h3>
                <div class="categories">
                    <div class="category">
                        <img src="./image/imageSite/evenement/soirée.jpg" alt="">
                        <span>Soirées</span>
                    </div>
                    <div class="category">
                        <img src="./image/imageSite/evenement/profesionnelle.jpg" alt="">
                        <span>Professionnel</span>
                    </div>
                    <div class="category">
                        <img src="./image/imageSite/evenement/sport.jpg" alt="">
                        <span>Sport</span>
                    </div>
                    <div class="category">
                        <img src="./image/imageSite/evenement/art_culture.jpg" alt="">
                        <span>Art et Culture</span>
                    </div>
                    <div class="category">
                        <img src="./image/imageSite/evenement/technologie.jpg" alt="">
                        <span>Technologie</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="evenement-populaire">
            <div class="popu-container">
                <h3>Événements populaires à Paris</h3>
                <div class="popuevenement">
                    <button class="event-card" onclick="showDetails(0)">
                        <img src="./image/imageSite/evenement/village_noel.jpg"
                            alt="image lien vers le village de noel">
                        <div class="event-info">
                            <h4>Le Village de Noël</h4>
                            <p>06/12 - Zénith de La Villette</p>
                            <p>Marché festif, animations familiales et gourmandises pour tous.</p>
                        </div>
                    </button>
                    <button class="event-card" onclick="showDetails(1)">
                        <img src="./image/imageSite/evenement/hallowen.jpg" alt="image lien vers la soirée halloween">
                        <div class="event-info">
                            <h4>Halloween</h4>
                            <p>31/10 - Paris</p>
                            <p>Soirée costumes, spectacles et ambiance effrayant. Des surprises terrifiantes vous attendent à Paris.</p>
                        </div>
                    </button>
                    <button class="event-card" onclick="showDetails(2)">
                        <img src="./image/imageSite/evenement/conference.jpg"
                            alt="image lien vers la conférence accessibilité">
                        <div class="event-info">
                            <h4>Conférence Accessibilité</h4>
                            <p>07/11 - Campus UGE Paris</p>
                            <p>Ateliers et échanges pour un monde plus inclusif.</p>
                        </div>
                    </button>
                    <button class="event-card" onclick="showDetails(3)">
                        <img src="./image/imageSite/evenement/comment_se_vendre.jpg"
                            alt="image lien vers la conférence comment se vendre">
                        <div class="event-info">
                            <h4>Comment se vendre ?</h4>
                            <p>29/11 - Sciences Po Paris</p>
                            <p>Astuces pour réussir entretiens et présentations. Découvrez les clés pour vous mettre en valeur.</p>
                        </div>
                    </button>
                </div>
            </div>
        </section>
        <section class="evenement-populaire">
            <div class="popu-container">
                <h3>Événements en ligne</h3>
                <div class="popuevenement">
                    <button class="event-card" onclick="showDetails(4)">
                        <img src="./image/imageSite/evenement/tournoi.jpg" alt="">
                        <div class="event-info">
                            <h4>Tournoi jeux vidéos</h4>
                            <p>En ligne</p>
                            <p>Affrontez des joueurs et gagnez des prix excitants.</p>
                        </div>
                    </button>
                    <button class="event-card" onclick="showDetails(5)">
                        <img src="./image/imageSite/evenement/climat.jpg" alt="">
                        <div class="event-info">
                            <h4>Conférence Climat</h4>
                            <p>En ligne</p>
                            <p>Débattons des solutions face à l’urgence climatique.</p>
                        </div>
                    </button>
                    <button class="event-card" onclick="showDetails(6)">
                        <img src="./image/imageSite/evenement/amnesty.png" alt="">
                        <div class="event-info">
                            <h4>Rencontre Amnesty</h4>
                            <p>En ligne</p>
                            <p>Échangez sur les droits humains avec des militants.</p>
                        </div>
                    </button>
                    <button class="event-card" onclick="showDetails(7)">
                        <img src="./image/imageSite/evenement/unicef.jpg" alt="">
                        <div class="event-info">
                            <h4>Rencontre Unicef</h4>
                            <p>En ligne</p>
                            <p>Explorez les projets d’Unicef pour aider les enfants.</p>
                        </div>
                    </butt>
                </div>
            </div>
        </section>
    </div>

    <!-- page des details -->
    <div id="detailPage">
        <button class="back-button" onclick="goBack()" aria-label="retourner sur la page événements"><i class="fa-solid fa-arrow-left"></i></button>
        <div class="upper-page-container">
            <div class="left-side">
                <a href="./index.php?action=accueil" class="suivi">Accueil </a><a href="./index.php?action=evenement"
                    class="suivi"><span class="suivi">> Événements </span></a><span class="suivi" id="suivi"></span>
            </div>
        </div>
        <section class="img-details">
            <img class="img-container" id="image" alt="Image de l'événement">
            <div class="card">
                <div class="left">
                    <h1 id="titre"></h1>
                    <p class="pleftone">Organisateur : <span id="organisateur"></span></p>
                </div>
                <div class="right">
                    <p><i class="fa-solid fa-calendar-days"></i><span id="date"></span></p>
                    <p><i class="fa-solid fa-clock"></i><span id="heure"></span></p>
                </div>
            </div>
            <div class="card">
                <div class="left">
                    <h2>Lieu</h2>
                    <p class="plefttwo"><i class="fa-solid fa-location-dot"></i><span id="lieu"></span></p>
                    <img id="img_maps" alt="">
                </div>
                <div class="right">
                    <a href="#" class="fakeboutton"><i class="fa-solid fa-ticket"></i> Réservé une place</a>
                    <p class="texteinfoticket">Ticket Information</p>
                    <p class="texteinfoticket2">Ticket Standard : <span id="prix"></span></p>
                </div>
            </div>
            <div class="desccontent">
                <h3>Description de l'événement</h3>
                <p id="description">
                </p>
            </div>
        </section>
    </div>
    <footer>

</footer>

    <script src="./Javascript/index.js"></script>
    <script src="./Javascript/evenement.js"></script>
</body>

</html>