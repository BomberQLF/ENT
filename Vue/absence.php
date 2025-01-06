<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absences et retards</title>
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="stylesheet" href="./Style/absences.css">
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
                <?php if (isAdmin()): ?>
                    <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
                <?php endif; ?>
            </ul>
        </div>

    </nav>
    <div class="upper-page-container">
        <div class="left-side">
            <a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">> Absences et
                retards</span>
        </div>
        <div class="right-side">
            <h1 id="profil">Mes absences</h1>
        </div>
    </div>

    <section class="abcences-container" id="header-website">
        <div class="header">
            <label for="absence-select">Choisissez entre absence ou retard :</label>
            <select id="absence-select">
                <option value="">Sélectionner</option>
                <option value="absence">Absence</option>
                <option value="retard">Retard</option>
            </select>
        </div>

        <?php
        $absences = getabsences($_SESSION['id_utilisateur']);
        $retards = getretards($_SESSION['id_utilisateur']); ?>
        <div class="Partie-absences">
            <div class="container-h2">
                <h2>Vos statistiques d'absences</h2>
            </div>
            <div class="stats">
                <div class="stat">
                    <h3>Total d'absences</h3>
                    <p><?php echo count($absences); ?></p>
                </div>
                <div class="stat">
                    <h3>Taux d'absences</h3>
                    <p><?php

                    $totalMinutesAbsences = 0;
                    foreach ($absences as $absence) {
                        $totalMinutesAbsences += $absence['duree_minutes'];
                    }
                    $totalCoursMinutes = 666;

                    if ($totalCoursMinutes > 0) {
                        $tauxAbsence = ($totalMinutesAbsences / $totalCoursMinutes) * 100;
                    } else {
                        $tauxAbsence = 0;
                    }
                    echo number_format($tauxAbsence, 1) . '%';
                    ?></p>
                </div>
                <div class="stat">
                    <h3>Absences injustifié</h3>
                    <p><?php
                    $absencesAJustifier = 0;
                    foreach ($absences as $absence) {
                        if ($absence['statut'] === 'Injustifié') {
                            $absencesAJustifier++;
                        }
                    }
                    echo $absencesAJustifier;
                    ?></p>
                </div>
                <div class="stat">
                    <h3>Absences justifiées</h3>
                    <p><?php
                    $absencesJustifiees = 0;
                    foreach ($absences as $absence) {
                        if (trim(strtolower($absence['statut'])) === 'justifiée') {
                            $absencesJustifiees++;
                        }
                    }
                    echo $absencesJustifiees;
                    ?></p>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Matière</th>
                        <th>Professeur</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // Sépare les absences injustifié et les absences justifiées
                    $absencesAJustifier = [];
                    $absencesJustifiees = [];
                    foreach ($absences as $absence) {
                        if (trim(strtolower($absence['statut'])) === 'injustifié') {
                            $absencesAJustifier[] = $absence;
                        } elseif (trim(strtolower($absence['statut'])) === 'justifiée') {
                            $absencesJustifiees[] = $absence;
                        }
                    }

                    // Afficher les absences à justifier
                    foreach ($absencesAJustifier as $absence) {
                        $date = new DateTime($absence['date']);
                        $formattedDate = $date->format('m/d/Y');
                        echo '<tr>
                            <td><input type="checkbox"></td>
                            <td>' . $absence['matiere'] . '</td>
                            <td>' . $absence['professeur'] . '</td>
                            <td>' . $absence['duree_minutes'] . " h" . '</td>
                            <td>' . $formattedDate . '</td>
                            <td>' . $absence['statut'] . '</td>
                        </tr>';
                    }

                    // Afficher les absences justifiées après celles à justifier
                    foreach ($absencesJustifiees as $absence) {
                        $date = new DateTime($absence['date']);
                        $formattedDate = $date->format('m/d/Y');
                        echo '<tr>
                            <td><input type="checkbox" disabled></td>
                            <td>' . $absence['matiere'] . '</td>
                            <td>' . $absence['professeur'] . '</td>
                            <td>' . $absence['duree_minutes'] . " h" . '</td>
                            <td>' . $formattedDate . '</td>
                            <td>' . $absence['statut'] . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div class="barre-justification">
                <p>Sélectionnez vos absences afin de justifier plusieurs absences en même temps.<br><span
                        style="color:red;">Attention : si vous sélectionnez plusieurs absences à la fois, il est attendu
                        que vous fournissiez un justificatif unique couvrant l’ensemble de ces absences.</span></p>
                <button>Justification</button>
            </div>
        </div>

        <!-- Div retards -->
        <div class="Partie-retards">
            <div class="container-h2">
                <h2>Vos statistiques de retards</h2>
            </div>
            <div class="stats">
                <div class="stat">
                    <h3>Total de retards</h3>
                    <p><?php echo count(value: $retards); ?></p>
                </div>
                <div class="stat">
                    <h3>Taux de retards</h3>
                    <p>
                        <?php

                        $totalretard = 0;
                        foreach ($retards as $retard) {
                            $totalretard += $retard['duree_minutes'];
                        }
                        $totalCoursMinutes = 666;

                        if ($totalCoursMinutes > 0) {
                            $tauxretard = ($totalretard / $totalCoursMinutes) * 100;
                        } else {
                            $tauxretard= 0;
                        }
                        echo number_format($tauxretard, 1) . '%';
                        ?>
                    </p>
                </div>
                <div class="stat">
                    <h3>retards injustifié</h3>
                    <p><?php
                    $retardsAJustifier = 0;
                    foreach ($retards as $retard) {
                        if ($retard['statut'] === 'Injustifié') {
                            $retardsAJustifier++;
                        }
                    }
                    echo $retardsAJustifier;
                    ?></p>
                </div>
                <div class="stat">
                    <h3>retards justifiées</h3>
                    <p><?php
                    $retardsJustifiees = 0;
                    foreach ($retards as $retard) {
                        if (trim(strtolower($retard['statut'])) === 'justifiée') {
                            $retardsJustifiees++;
                        }
                    }
                    echo $retardsJustifiees;
                    ?></p>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Matière</th>
                        <th>Professeur</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // Sépare les absences injustifié et les absences justifiées
                    $retardsAJustifier = [];
                    $retardsJustifiees = [];
                    foreach ($retards as $retard) {
                        if (trim(strtolower($retard['statut'])) === 'injustifié') {
                            $retardsAJustifier[] = $retard;
                        } elseif (trim(strtolower($retard['statut'])) === 'justifiée') {
                            $retardsJustifiees[] = $retard;
                        }
                    }

                    // Afficher les absences à justifier
                    foreach ($retardsAJustifier as $retard) {
                        $date = new DateTime($retard['date']);
                        $formattedDate = $date->format('m/d/Y');
                        echo '<tr>
                            <td><input type="checkbox"></td>
                            <td>' . $retard['matiere'] . '</td>
                            <td>' . $retard['professeur'] . '</td>
                            <td>' . $retard['duree_minutes'] . " h" . '</td>
                            <td>' . $formattedDate . '</td>
                            <td>' . $retard['statut'] . '</td>
                        </tr>';
                    }

                    // Afficher les absences justifiées après celles à justifier
                    foreach ($retardsJustifiees as $retard) {
                        $date = new DateTime($retard['date']);
                        $formattedDate = $date->format('m/d/Y');
                        echo '<tr>
                            <td><input type="checkbox" disabled></td>
                            <td>' . $retard['matiere'] . '</td>
                            <td>' . $retard['professeur'] . '</td>
                            <td>' . $retard['duree_minutes'] . " h" . '</td>
                            <td>' . $formattedDate . '</td>
                            <td>' . $retard['statut'] . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div class="barre-justification">
                <p>Sélectionnez vos absences afin de justifier plusieurs absences en même temps.<br><span
                        style="color:red;">Attention : si vous sélectionnez plusieurs absences à la fois, il est attendu
                        que vous fournissiez un justificatif unique couvrant l’ensemble de ces absences.</span></p>
                <button>Justification</button>
            </div>
        </div>
    </section>

    <script src="./Javascript/index.js"></script>
    <script src="./Javascript/absence.js"></script>
</body>

</html>