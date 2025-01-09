<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/emploiDuTemps.css">
    <link rel="stylesheet" href="./Style/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <title>Accueil - ENT</title>
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
            <a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">></span>
        </div>
        <div class="right-side">
            <h1 id="profil">Accueil</h1>
        </div>
    </div>

    <div class="accueil-container">
        <div class="emploidutempsdiv" id="header-website">
            <div class="content-text">
                <a class="emploiea" href="./index.php?action=emploiDuTemps&week=0">Voir Votre emploi du temps</a>
            </div>
            <p class="titre">Janvier 2025</p>
            <div class="jouremploietemps">
                <span><i class="fa-solid fa-play fa-rotate-180"></i></span>
                <span>08</span>
                <span>09</span>
                <span>10</span>
                <span style="background-color: #4E6182; color: white;">11</span>
                <span>12</span>
                <span>13</span>
                <span>14</span>
                <span><i class="fa-solid fa-play"></i></span>
            </div>
            <div class="emploiedutempscouleur">
                <div class="time-column-accueil">
                    <div class="time-slot-accueil">8:15</div>
                    <div class="time-slot-accueil">9:15</div>
                    <div class="time-slot-accueil">10:15</div>
                    <div class="time-slot-accueil">11:15</div>
                    <div class="time-slot-accueil">12:15</div>
                    <div class="time-slot-accueil">13:15</div>
                    <div class="time-slot-accueil">14:15</div>
                    <div class="time-slot-accueil">15:15</div>
                    <div class="time-slot-accueil">16:15</div>
                    <div class="time-slot-accueil">17:15</div>
                    <div class="time-slot-accueil">17:45</div>
                </div>
                <div class="cours-div">
                    <div class="cours-slot">
                        <div>
                            <h3>SAE 3.01 Integrer des interfaces - B</h3>
                            <p>CHARPENTIER</p>
                        </div>
                        <div>
                            <p>IUC 120</p>
                            <p>8h15 - 10h15</p>
                        </div>
                    </div>
                    <div class="cours-slot">
                        <div>
                            <h3>SAE 3.02 Produire des contenus - AB</h3>
                            <p>HOUZIAUX</p>
                        </div>
                        <div>
                            <p>IUC 157</p>
                            <p>10h30 - 12h30</p>
                        </div>
                    </div>
                    <div class="cours-slot">
                        <div>
                            <h3>SAE 3.01 Intégrer des interfaces - AB</h3>
                            <p>LAOUFI</p>
                        </div>
                        <div>
                            <p>IUC 123</p>
                            <p>13h30 - 15h30</p>
                        </div>
                    </div>
                    <div class="cours-slot">
                        <div>
                            <h3>R3.01 Anglais - B</h3>
                            <p>LEROY</p>
                        </div>
                        <div>
                            <p>IUC 126</p>
                            <p>15h45 - 17h45</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tachescontainer">
            <div class="content-text">
                <h2>Vos prochaines tâches à faire</h2>
                <a href="./index.php?action=todoListPage">Voir toutes les tâches</a>
            </div>
            <div class="listdestaches">
                <div class="tachediv">
                    <p style="font-weight: bold;">titre tache</p>
                    <p>date en lettre</p>
                    <p>debut description tache</p>
                </div>
                <div class="tachediv">
                    <p style="font-weight: bold;">titre tache</p>
                    <p>date en lettre</p>
                    <p>debut description tache</p>
                </div>
                <div class="tachediv">
                    <p style="font-weight: bold;">titre tache</p>
                    <p>date en lettre</p>
                    <p>debut description tache</p>
                </div>
            </div>
        </div>
        <div class="absenceretardcontainer">
            <div class="content-text">
                <h2>Vos absences et retards</h2>
                <a href="./index.php?action=absence">Justifier</a>
            </div>
            <div class="cards-container">
                <div class="card">
                    <p>Absences à justifier</p>
                    <span>03</span>
                </div>
                <div class="card">
                    <p>Retards à justifier</p>
                    <span>02</span>
                </div>
            </div>
        </div>
        <div class="eventcontainer">
            <div class="content-text">
                <h2>Les derniers événements universitaire</h2>
                <a href="./index.php?action=evenement">Voir les autres événements</a>
            </div>
            <div class="listeeventcard">
                <div class="eventcard">
                    <img src="./image/imageSite/evenement/village_noel.jpg" alt="">
                    <h3>Village de Noël</h3>
                    <p>Le village de Noël vous rappellera l’esprit de Noël...</p>
                </div>
                <div class="eventcard">
                    <img src="./image/imageSite/evenement/hallowen.jpg" alt="">
                    <h3>Halloween</h3>
                    <p>C’est bientôt l’heure, préparez vos déguisements...</p>
                </div>
                <div class="eventcard">
                    <img src="./image/imageSite/evenement/conference.jpg" alt="">
                    <h3>Conférence</h3>
                    <p>Retrouvez Mme Gaëlle Charpentier pour une ...</p>
                </div>
            </div>
        </div>
        <div class="notecontainer">
            <div class="content-text">
                <h2>Mes dernières notes</h2>
                <a href="./index.php?action=notesPage">Voir toutes les notes</a>
            </div>
            <div class="table-scroll">
                <table class="notes-table">
                    <thead>
                        <tr>
                            <th>Matières</th>
                            <th>Professeur</th>
                            <th>Note</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>matiere</td>
                            <td>professeur</td>
                            <td>note</td>
                            <td>date</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="menucrouscontainer">
            <div class="menu">
                <h2>MENU DU CROUS</h2>
                <button id="esiee">▶ ESIEE</button>
                <button id="copernic" class="active">▶ COPERNIC</button>
            </div>
            <div class="menu-contenu" id="menu-copernic" style="display: block;">
                <div>
                    <h3 class="menu-titre">Entrée</h3>
                    <p>Tomates</p>
                </div>
                <div>
                    <h3 class="menu-titre">Plat</h3>
                    <p>Pierogi</p>
                </div>
                <div>
                    <h3 class="menu-titre">Dessert</h3>
                    <p>Tarte aux pommes</p>
                </div>
            </div>
            <div class="menu-contenu" id="menu-esiee">
                <div>
                    <h3 class="menu-titre">Entrée</h3>
                    <p>Tomates</p>
                </div>
                <div>
                    <h3 class="menu-titre">Plat</h3>
                    <p>Steack haché</p>
                </div>
                <div>
                    <h3 class="menu-titre">Dessert</h3>
                    <p>Beignet à la fraise</p>
                </div>
            </div>
        </div>
        <div class="crousizly">
            <h2>Compte Izly</h2>
            <div class="progress-circle">
                <div class="inner-circle">+ 5,00 €</div>
                <p class="datesolde">Solde du 11/11/24</p>
                <a id="buttonMenucrous" href="index.php?action=menuCrous&showPopup=true">Ajouter des fonds</a>
            </div>
        </div>
    </div>

    <script src="./Javascript/index.js"></script>
    <script src="./Javascript/accueil.js"></script>
</body>

</html>