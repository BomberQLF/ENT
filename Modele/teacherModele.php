<?php

// BACKOFFICE

function updateNotes($id_note, $matiere, $note, $professeur, $moyenne_classe, $date_attribution): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare(
        "UPDATE notes
        SET matiere = :matiere, note = :note, professeur = :professeur, moyenne_classe = :moyenne_classe, date_attribution = :date_attribution
        WHERE id_note = :id_note"
    );
    $query->bindParam(":id_note", $id_note, PDO::PARAM_INT);
    $query->bindParam(":matiere", $matiere, PDO::PARAM_STR);
    $query->bindParam(":note", $note, PDO::PARAM_STR);
    $query->bindParam(":professeur", $professeur, PDO::PARAM_STR);
    $query->bindParam(":moyenne_classe", $moyenne_classe, PDO::PARAM_STR);
    $query->bindParam(":date_attribution", $date_attribution);

    return $query->execute();
}

function deleteNote($id_note): bool
{
    $pdo = connect_db(); 
    $query = $pdo->prepare("DELETE FROM notes WHERE id_note = :id_note"); 
    $query->bindParam(":id_note", $id_note, PDO::PARAM_INT);
    return $query->execute(); 
}