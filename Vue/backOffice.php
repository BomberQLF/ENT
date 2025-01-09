<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/backOffice.css">
    <link rel="stylesheet" href="./Style/notes.css">
    <link rel="stylesheet" href="./Style/todoList.css">
    <script src="./Javascript/index.js"></script>
    <script src="./Javascript/backOffice.js"></script>
    <script src="./Javascript/absence.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />

    <title>Back Office</title>
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
                    <li><a href="#">Événements</a></li>
                </ul>
            </li>
            <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
        </ul>


        <div class="profilandexit">
            <a href="./index.php?action=profil" class="navbar-profile">
                <?php echo " <span>Bienvenue {$_SESSION['prenom']}</span>" ?>
                <div class="profile-circle"></div>
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
                <li><a href="#"><i class="fa-solid fa-house"></i>Accueil</a></li>

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


    <!-- Fil ariane -->
    <div class="upper-page-container">
        <div class="left-side"><a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">>
                Backoffice</span></div>
        <div class="right-side">
            <h1 id="notes">Backoffice</h1>
        </div>
    </div>

    <!-- FILTRES -->
    <div class="backoffice-container">
        <div class="filterbar-backoffice">
            <ul class="filters">
                <li><span class="ftr">Notes</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Todolist</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Absences</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Utilisateurs</span></li>
            </ul>
            <ul class="filters">
                <li><span class="ftr">Messagerie</span></li>
            </ul>
        </div>
    </div>

    <!-- ADMINISTRATION NOTES -->
    <div class="notes-container hidden" style="padding: 0 4rem 4rem 4rem">
    <!-- Formulaire de sélection pour filtrer les notes -->
    <form action="./index.php" method="GET" class="filter-form">
        <input type="hidden" name="action" value="viewNotes">
        <label for="student">Filtrer par élève :</label>
        <select name="student" id="student" onchange="this.form.submit()">
            <option value="">Tous les élèves</option>
            <?php 
            $students = showUsers(); // Récupère la liste des élèves
            foreach ($students as $student): ?>
                <option value="<?= htmlspecialchars($student['prenom']) ?>"
                    <?= (isset($_GET['student']) && $_GET['student'] === $student['prenom']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($student['prenom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <div class="notes-table-wrapper">
    <?php if (!empty($noteEleves) && is_array($noteEleves)): ?>
        <table class="notes-table">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Matières</th>
                    <th>Professeur</th>
                    <th>Note</th>
                    <th>Moyenne de classe</th>
                    <th>Date</th>
                    <th>Enregistrer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($noteEleves as $note): ?>
                    <tr>
                        <td>
                            <a href="index.php?action=deleteNote&id=<?= $note['id_note']; ?>" class="delete-note">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <form action="./index.php?action=modifyNotes" method="POST">
                            <input type="hidden" name="id_note" value="<?= htmlspecialchars($note['id_note']) ?>">
                            <td>
                                <input type="text" name="matiere" id="matiere" value="<?= htmlspecialchars($note['matiere']) ?>">
                            </td>
                            <td>
                                <input type="text" name="professeur" id="professeur" value="<?= htmlspecialchars($note['professeur']) ?>">
                            </td>
                            <td>
                                <input type="text" name="note" id="note" value="<?= htmlspecialchars($note['note']) ?>">
                            </td>
                            <td>
                                <input type="text" name="moyenne_classe" id="moyenne_classe" value="<?= htmlspecialchars($note['moyenne_classe']) ?>">
                            </td>
                            <td>
                                <input type="date" name="date_attribution" id="date_attribution" value="<?= htmlspecialchars($note['date_attribution']) ?>">
                            </td>
                            <td>
                                <input type="submit" class="backoffice-btn" value="Enregistrer">
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune note trouvée.</p>
    <?php endif; ?>
</div>

<!-- Formulaire pour ajouter une nouvelle note -->
<?php if (isset($_GET['student']) && $_GET['student'] !== ''): ?>
    <div class="notes-horizontal-table-wrapper">
        <form action="./index.php?action=addNote" method="POST" class="add-note-form">
            <table class="notes-horizontal-table">
                <thead>
                    <tr>
                        <th>Matière</th>
                        <th>Professeur</th>
                        <th>Note</th>
                        <th>Moyenne de classe</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="matiere" id="matiere" required></td>
                        <td><input type="text" name="professeur" id="professeur" required></td>
                        <td><input type="text" name="note" id="note" required></td>
                        <td><input type="text" name="moyenne_classe" id="moyenne_classe" required></td>
                        <td><input type="date" name="date_attribution" id="date_attribution" required></td>
                        <td>
                            <input type="hidden" name="id_utilisateur" value="<?= htmlspecialchars(getUserIdByFirstName($_GET['student'])) ?>">
                            <button type="submit" class="backoffice-btn">Ajouter</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
<?php else: ?>
    <p class="notes-horizontal-table-wrapper" style="padding:1rem;">Veuillez sélectionner un élève pour ajouter une note.</p>
<?php endif; ?>
    </div>
</div>

<div class="todolist-container hidden" style="padding: 0 4rem 4rem 4rem; border: none; margin: 0;">
    <!-- Formulaire pour sélectionner un élève -->
    <form action="./index.php" method="GET" class="filter-form">
        <input type="hidden" name="action" value="viewTasks">
        <label for="student">Filtrer par élève :</label>
        <select name="student" id="student" onchange="this.form.submit()">
            <option value="">Tous les élèves</option>
            <?php 
            $students = showUsers(); 
            foreach ($students as $student): ?>
                <option value="<?= htmlspecialchars($student['id_utilisateur']) ?>"
                    <?= (isset($_GET['student']) && $_GET['student'] == $student['id_utilisateur']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($student['prenom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Liste des tâches filtrées -->
    <div class="todolist-boxes">
        <?php 
        $tasks = isset($_GET['student']) && $_GET['student'] !== '' 
            ? showTasksByStudent($_GET['student']) 
            : showTasks(); // Récupère les tâches en fonction de l'élève sélectionné

        if (!empty($tasks) && is_array($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
                <div class="todolist-box">
                    <div class="todolist-box-content">
                        <form method="POST" action="index.php?action=update-task-stateBo" class="task-form" style="display:block;">
                            <input type="hidden" name="id_tache" value="<?= $task['id_tache'] ?>">
                            <label class="task-label" style="display:block;">
                                <input type="checkbox" name="etat_tache" class="circle-checkbox"
                                    <?= $task['etat_tache'] ? 'checked' : '' ?> onchange="this.form.submit()" />
                                <div class="task-info">
                                    <label for="date_tache"></label>
                                    <input type="text" name="date_tache" id="date_tache" value="<?= $task['date_tache'] ?>">
                                    <label for="titre"></label>
                                    <input type="text" name="titre" id="titre" value="<?= $task['titre'] ?>">
                                    <label for="description"></label>
                                    <input type="text" name="description" id="description" value="<?= $task['description'] ?>">
                                </div>
                            </label>
                            <input type="submit" value="Mettre à jour" class="submit-button">
                        </form>
                        <div class="pencil-container">
                            <a id="trash-todo" href="index.php?action=boDeleteTask&id=<?= $task['id_tache']; ?>"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune tâche trouvée.</p>
        <?php endif; ?>
    </div>

    <!-- Formulaire pour ajouter une nouvelle tâche -->
    <?php if (isset($_GET['student']) && $_GET['student'] !== ''): ?>
    <form action="./index.php?action=addTaskBo" method="POST" class="add-task-form" style="padding-bottom: 2rem;">
        <input type="hidden" name="id_utilisateur" value="<?= htmlspecialchars($_GET['student']) ?>">
        
        <!-- Date de la tâche -->
        <div class="form-group">
            <label for="date_tache">Date de la tâche :</label>
            <input type="date" name="date_tache" id="date_tache" required>
        </div>
        
        <!-- Titre -->
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required>
        </div>
        
        <!-- Description -->
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>
        
        <!-- Bouton de soumission -->
        <div class="form-group">
            <button type="submit" style="padding:1rem;" class="backoffice-btn">Ajouter une tâche</button>
        </div>
    </form>
<?php else: ?>
    <p>Veuillez sélectionner un élève pour ajouter une tâche.</p>
<?php endif; ?>
</div>

    <?php $allUsers = showUsers() ?>
    <div class="all-users-container hidden">
    <?php foreach ($allUsers as $user) : ?>
        <div class="users-container" style="padding: 0 4rem 4rem 4rem;">
            <form action="./index.php?action=modifyUserBo" method="POST">
                <div class="form-group">
                    <label for="id_utilisateur">ID Utilisateur</label>
                    <input type="text" id="id_utilisateur" name="id_utilisateur" value="<?= $user['id_utilisateur'] ?>">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?= $user['nom'] ?>">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?= $user['prenom'] ?>">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" value="<?= $user['login'] ?>">
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" value="<?= $user['telephone'] ?>">
                </div>
                <div class="form-group">
                    <label for="tp">TP</label>
                    <input type="text" id="tp" name="tp" value="<?= $user['tp'] ?>">
                </div>
                <div class="form-group">
                    <label for="admin">Admin</label>
                    <select id="admin" name="admin">
                        <option value="0" <?= $user['admin'] == 0 ? 'selected' : '' ?>>Non</option>
                        <option value="1" <?= $user['admin'] == 1 ? 'selected' : '' ?>>Oui</option>
                    </select>
                </div>
                <div class="button-container" style="display: block;">
                    <button type="submit">Modifier</button>
                    <a href="index.php?action=deleteUser&id=<?= $user['id_utilisateur'] ?>">Supprimer</a>
                </div>
            </form>
        </div>
    <?php endforeach;?>
    </div>


<div class="absences-container hidden">
    <div class="contenudebase">
    <!-- Formulaire de sélection pour filtrer les absences -->
<form action="./index.php" method="GET" class="filter-form">
    <input type="hidden" name="action" value="viewAbsences">
    <label for="student">Filtrer par élève :</label>
    <select name="student" id="student" onchange="this.form.submit()">
        <option value="">Tous les élèves</option>
        <?php 
        $students = showUsers(); // Récupère la liste des élèves
        foreach ($students as $student): ?>
            <option value="<?= htmlspecialchars($student['id_utilisateur']) ?>"
                <?= (isset($_GET['student']) && $_GET['student'] == $student['id_utilisateur']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($student['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<!-- Back-office : Absences -->
<div class="absences-table-wrapper">
    <?php if (isset($_GET['student']) && $_GET['student'] !== ''): ?>
        <?php $absences = getabsences($_GET['student']); ?>
        <?php if (!empty($absences) && is_array($absences)): ?>
            <form method="POST" action="index.php?action=updateAbsence">
    <table>
        <thead>
            <tr>
                <th>Matière</th>
                <th>Professeur</th>
                <th>Date</th>
                <th>Durée</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<h2 class=retard_absence_title>Absences</h2>";

            // Afficher toutes les absences
            foreach ($absences as $absence) {
                echo '<tr>
                        <td><input type="text" name="matiere_'.$absence['id_absence_retard'].'" value="'.htmlspecialchars($absence['matiere']).'"></td>
                        <td><input type="text" name="professeur_'.$absence['id_absence_retard'].'" value="'.htmlspecialchars($absence['professeur']).'"></td>
                        <td><input type="date" name="date_'.$absence['id_absence_retard'].'" value="'.htmlspecialchars($absence['date']).'"></td>
                        <td><input type="number" name="duree_'.$absence['id_absence_retard'].'" value="'.htmlspecialchars($absence['duree_minutes']).'"></td>
                        <td>
                            <select name="statut_'.$absence['id_absence_retard'].'">
                                <option value="justifiée" '.($absence['statut'] === 'justifiée' ? 'selected' : '').'>Justifiée</option>
                                <option value="injustifiée" '.($absence['statut'] === 'injustifiée' ? 'selected' : '').'>Injustifiée</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="id_absence_retard" value="'.$absence['id_absence_retard'].'">Sauvegarder</button>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</form>
        <?php else: ?>
            <p>Aucune absence trouvée.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Veuillez sélectionner un élève pour afficher les absences.</p>
    <?php endif; ?>
</div>

<!-- Back-office : Retards -->
<div class="retards-table-wrapper">
    <?php if (isset($_GET['student']) && $_GET['student'] !== ''): ?>
        <?php $retards = getRetards($_GET['student']); ?>
        <?php if (!empty($retards) && is_array($retards)): ?>
            <form method="POST" action="index.php?action=updateRetard">
    <table>
        <thead>
            <tr>
                <th>Matière</th>
                <th>Professeur</th>
                <th>Total</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Sépare les retards justifiés et injustifiés
            $retardsAJustifier = [];
            $retardsJustifiees = [];
            foreach ($retards as $retard) {
                if (trim(strtolower($retard['statut'])) === 'injustifié') {
                    $retardsAJustifier[] = $retard;
                } elseif (trim(strtolower($retard['statut'])) === 'justifiée') {
                    $retardsJustifiees[] = $retard;
                }
            }

            echo "<h2 class=retard_absence_title>Retards</h2>";

            foreach ($retards as $retard): ?>
                <tr>
                    <td>
                        <input 
                            type="text" 
                            name="matiere_<?php echo htmlspecialchars($retard['id_absence_retard'] ?? ''); ?>" 
                            value="<?php echo htmlspecialchars($retard['matiere'] ?? ''); ?>">
                    </td>
                    <td>
                        <input 
                            type="text" 
                            name="professeur_<?php echo htmlspecialchars($retard['id_absence_retard'] ?? ''); ?>" 
                            value="<?php echo htmlspecialchars($retard['professeur'] ?? ''); ?>">
                    </td>
                    <td>
                        <input 
                            type="number" 
                            name="duree_<?php echo htmlspecialchars($retard['id_absence_retard'] ?? ''); ?>" 
                            value="<?php echo htmlspecialchars($retard['duree_minutes'] ?? ''); ?>">
                    </td>
                    <td>
                        <input 
                            type="date" 
                            name="date_<?php echo htmlspecialchars($retard['id_absence_retard'] ?? ''); ?>" 
                            value="<?php echo htmlspecialchars($retard['date'] ?? ''); ?>">
                    </td>
                    <td>
                        <select 
                            name="statut_<?php echo htmlspecialchars($retard['id_absence_retard'] ?? ''); ?>">
                            <option 
                                value="justifiée" 
                                <?php echo ($retard['statut'] ?? '') === 'justifiée' ? 'selected' : ''; ?>>
                                Justifiée
                            </option>
                            <option 
                                value="injustifiée" 
                                <?php echo ($retard['statut'] ?? '') === 'injustifiée' ? 'selected' : ''; ?>>
                                Injustifiée
                            </option>
                        </select>
                    </td>
                    <td>
                        <button 
                            type="submit" 
                            name="id_absence_retard" 
                            value="<?php echo htmlspecialchars($retard['id_absence_retard'] ?? ''); ?>">
                            Mettre à jour
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
        <?php else: ?>
            <p>Aucun retard trouvé.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Veuillez sélectionner un élève pour afficher les retards.</p>
    <?php endif; ?>
</div>

    <script src="./Javascript/todolist.js"></script>
</body>

</html>