<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/todoList.css">
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
                    <li><a href="./index.php?action=absence">Absences et retards</a></li>
                </ul>
            </li>

            <li><a href="./index.php?action=emploiDuTemps&week=0" class="navbar-item"><i
                        class="fa-solid fa-calendar-days"></i>Emploi du temps</a>
            </li>
            <li><a href="#" class="navbar-item"><i class="fa-solid fa-school"></i>Vie étudiante</a>
                <ul class="submenu">
                    <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                    <li><a href="./index.php?action=evenement">Événements</a></li>
                </ul>
            </li>
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
                <a href="./index.php?action=logout" class="popupButtondeco">Se déconnecter</a>
            </div>
        </div>

        <!-- Barre de navigation version téléphone -->

        <div class="side-menu" id="sideMenu">
            <ul>
                <li><a href="./index.php?action=accueil"><i class="fa-solid fa-house"></i>Accueil</a></li>

                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-graduation-cap"></i>Mon suivi</a>
                    <ul class="submenu">
                        <li><a href="./index.php?action=notesPage">Notes</a></li>
                        <li><a href="./index.php?action=todoListPage">To do list</a></li>
                        <li><a href="./index.php?action=absence">Absences et retards</a></li>
                    </ul>
                </li>

                <li>
                    <a href="./index.php?action=emploiDuTemps&week=0"><i class="fa-solid fa-calendar-days"></i>Emploi du
                        temps</a>
                </li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-school"></i>Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="./index.php?action=menuCrous">Crous et mon IZLY</a></li>
                        <li><a href="./index.php?action=evenement">Événements</a></li>
                    </ul>
                </li>
                <?php if (isAdmin()): ?>
                    <li><a href="./index.php?action=backoffice" class="navbar-item">Administration</a></li>
                <?php endif; ?>
            </ul>
        </div>

    </nav>

    <!-- File d'arianne -->
    <div class="upper-page-container">
        <div class="left-side"><a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">> To
                do list</span></div>
        <div class="right-side">
            <h1 id="tâches">Mes tâches</h1>
        </div>
    </div>
    <!-- Contenu de la page -->
    <div class="page-container">
        <div class="page-content">
            <div class="todolist-container">
                <img id="add-todo-container" src="./image/imageSite/add-todolist-container.svg" alt="">
                <!-- Popup pour ajouter une tâche -->
                <!-- Popup pour ajouter une tâche -->
                <div class="overlay" id="overlay-add-task" style="display: none;"></div>
                <div class="add-task-container" id="add-task-container" style="display: none;">
                    <h2>Ajouter une tâche</h2>
                    <form id="add-task-form" action="index.php?action=add-task" method="POST">
                        <?php $tasks = showTasks(); ?>
                        <?php if (!empty($tasks)): ?>
                            <input type="hidden" value="<?= $tasks[0]['etat_tache']; ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="date_tache">Date de la tâche</label>
                            <input type="text" id="task-date" name="date_tache" placeholder="DD/MM" required>
                        </div>
                        <div class="form-group">
                            <label for="titre">Titre de la tâche</label>
                            <input type="text" id="task-title" name="titre" placeholder="PHP" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="task-description" name="description" rows="4" required></textarea>
                            <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id_utilisateur']; ?>">
                        </div>
                        <div class="button-container">
                            <button type="submit">Ajouter</button>
                            <button type="button" id="close-popup">Annuler</button>
                        </div>
                    </form>
                </div>
                <div class="todolist-header">
                    <button class="previous-week btn-week">&#9664;</button>
                    <h2>Semaine du <span id="starting-date">11</span>/<span id="starting-month">12</span>
                        au <span id="finishing-date">18</span>/<span id="finishing-month">12</span>
                    </h2>
                    <button class="next-week btn-week">&#9654;</button>
                </div>
                <hr>
                <?php
                // Vérifiez si l'utilisateur est connecté via la session
                if (isset($_SESSION['id_utilisateur'])) {
                    $id_utilisateur = $_SESSION['id_utilisateur'];

                    // Récupère uniquement les tâches de l'utilisateur connecté
                    $tasks = showTasksByStudent($id_utilisateur);
                } else {
                    // Si aucun utilisateur n'est connecté, afficher un message ou rediriger
                    echo "<p>Veuillez vous connecter pour accéder à vos tâches.</p>";
                    exit;
                }

                // Vérifie et affiche les tâches si elles existent
                if (!empty($tasks) && is_array($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <div class="todolist-box">
                            <div class="todolist-box-content">
                                <form method="POST" action="index.php?action=update-task-state" class="task-form"
                                    style="display:block;">
                                    <input type="hidden" name="id_tache" value="<?= htmlspecialchars($task['id_tache']) ?>">
                                    <input type="hidden" name="date_tache" value="<?= htmlspecialchars($task['date_tache']) ?>">
                                    <input type="hidden" name="titre" value="<?= htmlspecialchars($task['titre']) ?>">
                                    <input type="hidden" name="description"
                                        value="<?= htmlspecialchars($task['description']) ?>">
                                    <label class="task-label" style="display:block;">
                                        <input type="checkbox" name="etat_tache" class="circle-checkbox" <?= $task['etat_tache'] ? 'checked' : '' ?> onchange="this.form.submit()" />
                                        <div class="task-info">
                                            <h3><?= htmlspecialchars($task['date_tache']) ?></h3>
                                            <h4 class="todolist-title"><?= htmlspecialchars($task['titre']) ?></h4>
                                            <p class="todolist-description"><?= htmlspecialchars($task['description']) ?></p>
                                        </div>
                                    </label>
                                </form>
                                <div class="pencil-container">
                                    <a id="trash-todo"
                                        href="index.php?action=deleteTask&id=<?= htmlspecialchars($task['id_tache']); ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <i class="fa fa-pen-nib"
                                        onclick="showModifyTaskPopup(<?= htmlspecialchars($task['id_tache']) ?>)"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucune tâche trouvée.</p>
                <?php endif; ?>

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
            </div>
        </div>
        <div class="right-side-wrapper">
            <div class="calendar">
                <div class="calendar-wrapper">
                    <div class="month">
                        <button class="nav-btn">&#9664;</button>
                        <span>Décembre</span>
                        <button class="nav-btn">&#9654;</button>
                    </div>
                    <div class="days">
                        <div>L</div>
                        <div>M</div>
                        <div>M</div>
                        <div>J</div>
                        <div>V</div>
                        <div>S</div>
                        <div>D</div>
                    </div>
                    <div class="dates">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                        <div>9</div>
                        <div>10</div>
                        <div class="highlight">11</div>
                        <div class="highlight">12</div>
                        <div class="highlight">13</div>
                        <div class="highlight">14</div>
                        <div class="highlight">15</div>
                        <div class="highlight">16</div>
                        <div class="highlight">17</div>
                        <div class="highlight">18</div>
                        <div>19</div>
                        <div>20</div>
                        <div>21</div>
                        <div>22</div>
                        <div>23</div>
                        <div>24</div>
                        <div>25</div>
                        <div>26</div>
                        <div>27</div>
                        <div>28</div>
                        <div>29</div>
                        <div>30</div>
                        <div>1</div>
                    </div>
                </div>
            </div>
            <div class="collaborateurs-container">
                <div class="upper-collaborateurs">
                    <h2 id="collab-title">Vos collaborateurs</h2>
                </div>
                <div class="content-collaborateurs">
                    <div class="img-collaborateurs">
                        <img src="./image/uploads/Profile.svg" alt="">
                    </div>
                    <div class="info-collaborateurs">
                        <p class="nom-collaborateurs">Anastasia</p>
                        <span class="details-collaborateurs">SAE 3.02A, SAE 3.03, Audiovisuel</span>
                    </div>
                </div>
                <div class="content-collaborateurs">
                    <div class="img-collaborateurs">
                        <img src="./image/uploads/Profile.svg" alt="">
                    </div>
                    <div class="info-collaborateurs">
                        <p class="nom-collaborateurs">Anastasia</p>
                        <span class="details-collaborateurs">SAE 3.02A, SAE 3.03, Audiovisuel</span>
                    </div>
                </div>
                <div class="add-todo-container"><a href="#"><img src="./image/uploads/add-todo.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="./Javascript/index.js"></script>
    <script src="./Javascript/todolist.js"></script>
</body>

</html>