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

function showTasksByStudent($id_utilisateur)
{
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM taches WHERE id_utilisateur = :id_utilisateur");
    $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function isTaskOwnedByUser($id_tache, $id_utilisateur)
{
    global $pdo;
    $query = $pdo->prepare("SELECT COUNT(*) FROM tasks WHERE id_tache = :id_tache AND id_utilisateur = :id_utilisateur");
    $query->execute(['id_tache' => $id_tache, 'id_utilisateur' => $id_utilisateur]);
    return $query->fetchColumn() > 0;
}

// functions.php

// Fonction pour mettre à jour un retard
// function updateRetard($idRetard, $matiere, $professeur, $date, $duree, $statut)
// {
//     $pdo = connect_db();

//     $query = $pdo->prepare("UPDATE retards SET 
//     matiere = :matiere, 
//     professeur = :professeur, 
//     date = :date, 
//     duree_minutes = :duree, 
//     statut = :statut 
//   WHERE id_absence_retard = :id_absence_retard");


//     // Liaison des paramètres
//     $query->bindParam(':matiere', $matiere, PDO::PARAM_STR);
//     $query->bindParam(':professeur', $professeur, PDO::PARAM_STR);
//     $query->bindParam(':date', $date, PDO::PARAM_STR);
//     $query->bindParam(':duree', $duree, PDO::PARAM_INT);
//     $query->bindParam(':statut', $statut, PDO::PARAM_STR);
//     $query->bindParam(':id_absence_retard', $idRetard, PDO::PARAM_INT);

//     return $query->execute();
// }

// // Fonction pour mettre à jour une absence
// function updateAbsence($idAbsence, $matiere, $professeur, $date, $duree, $statut)
// {

//     $pdo = connect_db();

//     $query = $pdo->prepare("UPDATE absences SET 
//     matiere = :matiere, 
//     professeur = :professeur, 
//     date = :date, 
//     duree_minutes = :duree, 
//     statut = :statut 
//   WHERE id_absence_retard = :id_absence_retard");

//     // Liaison des paramètres
//     $query->bindParam(':matiere', $matiere, PDO::PARAM_STR);
//     $query->bindParam(':professeur', $professeur, PDO::PARAM_STR);
//     $query->bindParam(':date', $date, PDO::PARAM_STR);
//     $query->bindParam(':duree', $duree, PDO::PARAM_INT);
//     $query->bindParam(':statut', $statut, PDO::PARAM_STR);
//     $query->bindParam(':id_absence_retard', $idAbsence, PDO::PARAM_INT);

//     return $query->execute();
// }

// Fonction pour mettre à jour une absence ou un retard
function updateAbsenceRetard($idAbsenceRetard, $matiere, $professeur, $date, $duree, $statut, $absence)
{
    $pdo = connect_db();

    // La table est maintenant absences_retards
    $table = 'absences_retards';

    // Préparer la requête pour mettre à jour
    $query = $pdo->prepare("UPDATE $table SET 
        matiere = :matiere, 
        professeur = :professeur, 
        date = :date, 
        duree_minutes = :duree_minutes, 
        statut = :statut, 
        absence = :absence
        WHERE id_absence_retard = :id_absence_retard");

    // Liaison des paramètres
    $query->bindParam(':matiere', $matiere, PDO::PARAM_STR);
    $query->bindParam(':professeur', $professeur, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':duree_minutes', $duree, PDO::PARAM_INT);
    $query->bindParam(':statut', $statut, PDO::PARAM_STR);
    $query->bindParam(':absence', $absence, PDO::PARAM_INT); // Si 0 c'est un retard, sinon c'est une absence
    $query->bindParam(':id_absence_retard', $idAbsenceRetard, PDO::PARAM_INT);

    // Exécuter la requête
    return $query->execute();
}

function updateRetard($idRetard, $matiere, $professeur, $date, $duree, $statut) {
    $pdo = connect_db();

    // La table des retards
    $table = 'absences_retards';

    // Préparer la requête SQL
    $query = $pdo->prepare("UPDATE $table SET 
        matiere = :matiere,
        professeur = :professeur,
        date = :date,
        duree_minutes = :duree_minutes,
        statut = :statut
        WHERE id_absence_retard = :id_retard AND absence = 0");

    // Lier les paramètres
    $query->bindParam(':matiere', $matiere, PDO::PARAM_STR);
    $query->bindParam(':professeur', $professeur, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':duree_minutes', $duree, PDO::PARAM_INT);
    $query->bindParam(':statut', $statut, PDO::PARAM_STR);
    $query->bindParam(':id_retard', $idRetard, PDO::PARAM_INT);

    // Exécuter la requête et retourner le résultat
    return $query->execute();
}
