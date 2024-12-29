<?php

// BACKOFFICE

function updateNotes($matiere, $note, $professeur, $moyenne_classe, $date_attribution): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare(
    "UPDATE notes
    SET matiere = :matiere, note = :note, professeur = :professeur, moyenne_classe = :moyenne_classe, date_attribution = :date_attribution");
    $query->bindParam(":matiere", $matiere, PDO::PARAM_STR);
    $query->bindParam(":note", $note, PDO::PARAM_STR);
    $query->bindParam(":professeur", $professeur, PDO::PARAM_STR);
    $query->bindParam(":moyenne_classe", $moyenne_classe, PDO::PARAM_STR);
    $query->bindParam(":date_attribution", $date_attribution);

    $updateReussi = $query->execute();

    return $updateReussi;
}