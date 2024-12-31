<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/backOffice.css">
    <link rel="stylesheet" href="./Style/notes.css">
    <link rel="stylesheet" href="./Style/todoList.css">
    <script src="./Javascript/todolist.js"></script>
    <script src="./Javascript/backOffice.js"></script>
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
                    <li><a href="#">Réservation salles et matériels</a></li>
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-school"></i>Vie étudiante</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                    <li><a href="#">Événements</a></li>
                </ul>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
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
        <div class="average-container">
            <?php $average = showAverage($_SESSION['id_utilisateur']) ?>
            <span><?= "Moyenne : " . " " . $average . "/20" ?></span>
        </div>

        <div class="notes-wrapper">
            <div class="notes-title">
                <p>Matières</p>
                <p>Professeur</p>
                <p>Note</p>
                <p>Moyenne de classe</p>
                <p>Date</p>
            </div>
            <?php $noteEleves = showNotes($_SESSION['id_utilisateur']); ?>
            <?php foreach ($noteEleves as $note): ?>
                <form action="./index.php?action=modifyNotes" method="POST">
                    <div class="notes-contenu">
                        <a href="index.php?action=deleteNote&id=<?= $note['id_note']; ?>" class="delete-note">
                            <i class="fa fa-trash"></i>
                        </a>
                        <input type="hidden" name="id_note" value="<?= htmlspecialchars($note['id_note']) ?>">

                        <label class="hideLabel" for="matiere"></label>
                        <input type="text" name="matiere" id="matiere" value="<?= htmlspecialchars($note['matiere']) ?>">

                        <label class="hideLabel" for="professeur"></label>
                        <input type="text" name="professeur" id="professeur"
                            value="<?= htmlspecialchars($note['professeur']) ?>">

                        <label class="hideLabel" for="note"></label>
                        <input type="text" name="note" id="note" value="<?= htmlspecialchars($note['note']) ?>">

                        <label class="hideLabel" for="moyenne_classe"></label>
                        <input type="text" name="moyenne_classe" id="moyenne_classe"
                            value="<?= htmlspecialchars($note['moyenne_classe']) ?>">

                        <label class="hideLabel" for="date_attribution"></label>
                        <input type="date" name="date_attribution" id="date_attribution"
                            value="<?= htmlspecialchars($note['date_attribution']) ?>">
                        <div class="btn-container">
                            <input type="submit" class="backoffice-btn">
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="todolist-container hidden" style="padding: 0 4rem 4rem 4rem; border: none; margin: 0;" >
        <div class="todolist-boxes">
                    <!-- SCRIPT ICI POUR BOUCLER LES TACHES DANS LA BDD -->
                    <?php if (isset($successMessage)) {
                        echo '<p class="success-message">' . $successMessage . '</p>';
                    } ?>
                    <?php $tasks = showTasks(); ?>
                    <?php foreach ($tasks as $task): ?>
                        <div class="todolist-box">
                            <div class="todolist-box-content">
                                <form method="POST" action="index.php?action=update-task-state" class="task-form">
                                    <input type="hidden" name="id_tache" value="<?= $task['id_tache'] ?>">
                                    <label class="task-label">
                                        <input type="checkbox" name="etat_tache" class="circle-checkbox"
                                            <?= $task['etat_tache'] ? 'checked' : '' ?> onchange="this.form.submit()" />
                                        <div class="task-info">
                                            <h3><?= $task['date_tache'] ?></h3>
                                            <h4 class="todolist-title"><?= $task['titre'] ?></h4>
                                            <p class="todolist-description"><?= $task['description'] ?></p>
                                        </div>
                                    </label>
                                </form>
                                <div class="pencil-container">
                                    <a id="trash-todo" href="index.php?action=deleteTask&id=<?= $task['id_tache']; ?>"><i
                                            class="fa fa-trash"></i></a>
                                    <i class="fa fa-pen-nib" onclick="showModifyTaskPopup(<?= $task['id_tache'] ?>)"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Modifier une tâche -->
                        <!-- Modifier une tâche -->
                        <div class="overlay" id="overlay-add-task" style="display: none;"></div>
                        <div class="modify-task-container-<?php echo $task['id_tache'] ?>" id="modify-task-container"
                            style="display: none;">
                            <h2>Modifier une tâche</h2>
                            <form id="modify-task-form-<?= $task['id_tache'] ?>" action="index.php?action=modify-task"
                                method="POST">
                                <div class="form-group">
                                    <label for="date_tache">Date de la tâche</label>
                                    <input type="text" id="task-date" name="date_tache" value="<?= $task["date_tache"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre de la tâche</label>
                                    <input type="text" id="task-title" name="titre" value="<?= $task['titre']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="task-description" name="description"
                                        rows="4"><?= $task["description"]; ?></textarea>
                                    <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id_utilisateur']; ?>">
                                    <input type="hidden" name="id_tache" value="<?= $task['id_tache'] ?>">
                                </div>
                                <div class="button-container">
                                    <button type="submit">Ajouter</button>
                                    <button type="button" id="close-popup-mod">Annuler</button>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
    </div>
</body>

</html>