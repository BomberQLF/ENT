<?php
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

function getEmploiDuTemps($currentWeek) {
    $icalUrl = "https://edt.univ-eiffel.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=4905&projectId=26&calType=ical&nbWeeks=4";
    $icalData = getICalData($icalUrl);
    $events = parseICal($icalData);

    // Tri des événements par date et heure de début
    usort($events, function($a, $b) {
        $dateA = strtotime($a['DTSTART'] ?? '0');
        $dateB = strtotime($b['DTSTART'] ?? '0');
        return $dateA <=> $dateB;
    });

    // Gestion des semaines
    $startOfWeek = strtotime("monday this week +$currentWeek week 00:00:00");
    $endOfWeek = strtotime("friday this week +$currentWeek week 23:59:59");

    $filteredEvents = [];
    foreach ($events as $event) {
        $eventTimestamp = strtotime($event['DTSTART']);
        if ($eventTimestamp >= $startOfWeek && $eventTimestamp <= $endOfWeek) {
            $filteredEvents[] = $event;
        }
    }

    return $filteredEvents;
}

function getEventsByTP($tp): array
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE tp = :tp");
    $query->bindParam(':tp', $tp, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

$tp = $_SESSION['tp'] ?? 'A'; 
$events = getEventsByTP($tp);
