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

function showAllNotes(): array 
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM notes");
    $query->execute();
    $notes = $query->fetchAll();
    return $notes;
}

function showNotesByStudent($id_utilisateur): array
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM notes WHERE id_utilisateur = :id_utilisateur");
    $query->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getUserIdByFirstName($prenom): ?int
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT id_utilisateur FROM utilisateurs WHERE prenom = :prenom");
    $query->bindParam(":prenom", $prenom, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['id_utilisateur'] ?? null; 
}

function addNote($id_utilisateur, $matiere, $professeur, $note, $moyenne_classe, $date_attribution): bool
{
    $pdo = connect_db();
    $query = $pdo->prepare("
        INSERT INTO notes (id_utilisateur, matiere, professeur, note, moyenne_classe, date_attribution)
        VALUES (:id_utilisateur, :matiere, :professeur, :note, :moyenne_classe, :date_attribution)
    ");
    $query->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
    $query->bindParam(":matiere", $matiere, PDO::PARAM_STR);
    $query->bindParam(":professeur", $professeur, PDO::PARAM_STR);
    $query->bindParam(":note", $note, PDO::PARAM_STR);
    $query->bindParam(":moyenne_classe", $moyenne_classe, PDO::PARAM_STR);
    $query->bindParam(":date_attribution", $date_attribution, PDO::PARAM_STR);

    return $query->execute();
}