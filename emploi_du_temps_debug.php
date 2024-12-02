
<?php
$icalUrl = "https://edt.univ-eiffel.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=4905&projectId=26&calType=ical&nbWeeks=4";

function getICalData($url) {
    return file_get_contents($url);
}

function parseICal($icalData) {
    $lines = explode("\n", $icalData);
    $events = [];
    $event = [];

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === "BEGIN:VEVENT") {
            $event = [];
        } elseif ($line === "END:VEVENT") {
            $events[] = $event;
        } elseif (strpos($line, ":") !== false) {
            list($key, $value) = explode(":", $line, 2);
            $event[$key] = $value;
        }
    }

    return $events;
}

$icalData = getICalData($icalUrl);
$events = parseICal($icalData);

// Tri des événements par date et heure de début
usort($events, function($a, $b) {
    $dateA = strtotime($a['DTSTART'] ?? '0');
    $dateB = strtotime($b['DTSTART'] ?? '0');
    return $dateA <=> $dateB;
});

// Gestion des semaines
$currentWeek = isset($_GET['week']) ? (int)$_GET['week'] : 0;
$startOfWeek = strtotime("monday this week +$currentWeek week 00:00:00");
$endOfWeek = strtotime("friday this week +$currentWeek week 23:59:59");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du Temps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .schedule-container {
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .day {
            margin-bottom: 20px;
        }
        .day-header {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .event {
            position: relative;
            background: #6C9BD1;
            color: white;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
        }
        .time {
            font-weight: bold;
        }
        .location {
            font-style: italic;
        }
        .navigation {
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
        }
        .navigation a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="navigation">
        <a href="?week=<?= $currentWeek - 1 ?>">Semaine Précédente</a>
        <a href="?week=<?= $currentWeek + 1 ?>">Semaine Suivante</a>
    </div>
    <div class="schedule-container">
        <?php 
        $currentDay = "";
        foreach ($events as $event): 
            $eventTimestamp = strtotime($event['DTSTART']);
            if ($eventTimestamp < $startOfWeek || $eventTimestamp > $endOfWeek) {
                continue;
            }
            $date = date('l d/m/Y', $eventTimestamp);
            $dayOfWeek = date('N', $eventTimestamp); // 1 = Lundi, 5 = Vendredi
            if ($dayOfWeek > 5) {
                continue; // Ignorer les événements du week-end
            }
            $startTime = date('H:i', $eventTimestamp);
            $endTime = date('H:i', strtotime($event['DTEND']));
            $summary = htmlspecialchars($event['SUMMARY'] ?? 'N/A');
            $location = htmlspecialchars($event['LOCATION'] ?? 'N/A');
            $description = htmlspecialchars($event['DESCRIPTION'] ?? '');
        ?>
            <?php if ($currentDay !== $date): ?>
                <div class="day">
                    <div class="day-header"><?= $date ?></div>
                </div>
                <?php $currentDay = $date; ?>
            <?php endif; ?>
            <div class="event">
                <div class="time"><?= $startTime ?> - <?= $endTime ?></div>
                <div class="summary"><?= $summary ?></div>
                <div class="location"><?= $location ?></div>
                <div class="description"><?= $description ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <h3>Débogage des événements :</h3>
        <?php 
            echo "<pre>";
            foreach ($events as $event) {
                echo "Date de début : " . date('l d/m/Y H:i', strtotime($event['DTSTART'])) . "<br>";
                echo "Date de fin : " . date('l d/m/Y H:i', strtotime($event['DTEND'])) . "<br>";
                echo "Résumé : " . htmlspecialchars($event['SUMMARY'] ?? 'N/A') . "<br>";
                echo "Lieu : " . htmlspecialchars($event['LOCATION'] ?? 'N/A') . "<br><hr>";
            }
            echo "</pre>";
        ?>
    </div>
</body>
</html>
