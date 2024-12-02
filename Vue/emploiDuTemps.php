<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/emploiDuTemps.css">
    <link rel="stylesheet" href=".Style/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <title>Accueil - ENT</title>
</head>

<body>
    <nav>
        <a href="./index.php?action=accueil" class="navbar-home"><i class="fa-solid fa-house"></i></a>
        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Barre de navigation d'origine -->

        <ul id="navbarLinks">
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-book"></i>Mon suivi</a>
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
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-graduation-cap"></i>Vie étudiante</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                    <li><a href="#">Événements</a></li>
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
        </ul>


        <a href="#" class="navbar-profile">
            <span>Bienvenue, Anastasia</span>
            <div class="profile-circle"></div>
        </a>

        <!-- Barre de navigation version téléphone -->

        <div class="side-menu" id="sideMenu">
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Accueil</a></li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-book"></i>Mon suivi</a>
                    <ul class="submenu">
                        <li><a href="#">Notes</a></li>
                        <li><a href="index.php?action=todoListPage">To do list</a></li>
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
                    <a href=""><i class="fa-solid fa-graduation-cap"></i>Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="index.php?acion=menuCrous">Crous et mon IZLY</a></li>
                        <li><a href="#">Événements</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
            </ul>
        </div>

    </nav>




    <div class="schedule-container">
        <h2>Emploi du Temps</h2>
        <div class="navigation">
            <a href="?action=emploiDuTemps&week=<?= $currentWeek - 1 ?>">Semaine Précédente</a>
            <a href="?action=emploiDuTemps&week=<?= $currentWeek + 1 ?>">Semaine Suivante</a>
        </div>

        <div class="schedule-grid">
            <div class="header">
                <div class="time-header"></div>
                <?php
                // Afficher tous les jours de la semaine
                $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                foreach ($daysOfWeek as $i => $day) {
                    $date = new DateTime("Monday this week +$i days");
                    $dayName = $date->format('l');
                    $dayNumber = $date->format('d');
                    $monthName = $date->format('F');
                    ?>
                    <div class="day-header">
                        <strong><?= $dayName; ?></strong><br>
                        <span><?= $dayNumber . ' ' . $monthName; ?></span>
                    </div>
                <?php } ?>
            </div>

            <div class="time-column">
                <?php
                $startHour = 8;
                $startMinute = 15;
                $endHour = 17;
                for ($hour = $startHour; $hour <= $endHour; $hour++) {
                    if ($hour == $startHour) {
                        echo "<div class='time-slot'>{$hour}:{$startMinute}</div>";
                    } else {
                        echo "<div class='time-slot'>{$hour}:00</div>";
                    }
                }
                echo "<div class='time-slot'>17:45</div>";
                ?>
            </div>

            <?php
            // Remplir la grille avec les événements
            foreach ($daysOfWeek as $i => $day) {
                $date = new DateTime("Monday this week +$i days");
                $dayName = $date->format('l');
                ?>
                <div class="day-column">
                    <?php
                    // TP de l'utilisateur
                    $userTP = isset($_SESSION['tp']) ? $_SESSION['tp'] : 'B';

                    // Filtrer les événements pour ce jour-là
                    foreach ($events as $event) {
                        // Extraire les détails de l'événement
                        $eventStart = strtotime($event['DTSTART']);
                        $eventEnd = strtotime($event['DTEND']);
                        $eventDay = date('l', $eventStart); // Jour de la semaine de l'événement
                        $description = isset($event['DESCRIPTION']) ? $event['DESCRIPTION'] : '';

                        // Vérifier si l'événement est pour le jour actuel
                        if ($eventDay == $dayName) {
                            // Extraire les TP associés à cet événement
                            if (preg_match_all('/TP\s([A-Z])/', $description, $matches)) {
                                $eventTPs = $matches[1];
                            } else {
                                $eventTPs = [];
                            }

                            // Vérifier si le TP de l'utilisateur est dans la liste des TP de l'événement
                            if (in_array($userTP, $eventTPs)) {
                                $startHour = date('H', $eventStart);
                                $startMinute = date('i', $eventStart);
                                $duration = ($eventEnd - $eventStart) / 3600;

                                // Calcul de l'heure de fin
                                $endHour = $startHour + floor($duration);
                                $endMinute = $startMinute + (($duration - floor($duration)) * 60);

                                // Si les minutes dépassent 60, ajustons l'heure
                                if ($endMinute >= 60) {
                                    $endHour++;
                                    $endMinute -= 60;
                                }

                                // Formater correctement les heures et minutes
                                $formattedEndTime = sprintf("%02d:%02d", $endHour, $endMinute);

                                // Calcul de la position top de l'événement (en pourcentage)
                                $top = (($startHour - 8) * 60 + $startMinute - 15) / 600 * 100;
                                $top += 10; // Décalage vers le bas
                                $height = $duration * (100 / 10);

                                $summary = htmlspecialchars($event['SUMMARY'] ?? 'N/A');
                                $location = htmlspecialchars($event['LOCATION'] ?? '');
                                ?>
                                <div class="event" style="top: <?= $top ?>%; height: <?= $height ?>%;">
                                    <strong><?= $summary ?></strong><br>
                                    <em><?= $location ?></em><br>
                                    <span><?= $startHour . ':' . str_pad($startMinute, 2, '0', STR_PAD_LEFT) . ' - ' . $formattedEndTime ?></span>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <script src="../index.js"></script>
</body>

</html>