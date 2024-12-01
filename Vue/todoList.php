<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/todoList.css">
    <script src="./Javascript/todolist.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <title>Document</title>
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
                    <li><a href="#">Emploi du temps</a></li>
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
            <span>Bienvenue, <?= $_SESSION['prenom']; ?></span>
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
                        <li><a href="#">To do list</a></li>
                        <li><a href="#">Absences et retards</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-calendar-days"></i>Planning et réservation</a>
                    <ul class="submenu">
                        <li><a href="#">Emploi du temps</a></li>
                        <li><a href="#">Réservation salles et matériels</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href=""><i class="fa-solid fa-graduation-cap"></i>Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="#">Crous et mon IZLY</a></li>
                        <li><a href="#">Événements</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa-solid fa-comment"></i>Messagerie</a></li>
            </ul>
        </div>
    </nav>

    <!-- File d'arianne -->
    <div class="upper-page-container">
        <div class="left-side"><a href="#" class="suivi">Mon suivi </a><span class="suivi">> To do list</span></div>
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
                            <input type="hidden" value="<?= $_SESSION['id_utilisateur'] ?>">
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
                <div class="todolist-boxes">
                    <div class="todolist-box">
                        <div class="todolist-box-header">
                            <h3 class="todolist-date">17/12</h3>
                            <!-- Reste -->
                        </div>
                        <div class="todolist-box-content">
                            <div class="task-title">
                                <h4 class="todolist-title">Javascript</h4>
                                <p class="todolist-description">À rendre pour la semaine prochaine</p>
                            </div>
                        </div>
                    </div>
                    <div class="todolist-box">
                        <div class="todolist-box-header">
                            <h3 class="todolist-date">17/12</h3>
                            <!-- Reste -->
                        </div>
                        <div class="todolist-box-content">
                            <div class="task-title">
                                <h4 class="todolist-title">Javascript</h4>
                                <p class="todolist-description">À rendre pour la semaine prochaine</p>
                            </div>
                        </div>
                    </div>
                    <div class="todolist-box">
                        <div class="todolist-box-header">
                            <h3 class="todolist-date">17/12</h3>
                            <!-- Reste -->
                        </div>
                        <div class="todolist-box-content">
                            <div class="task-title">
                                <h4 class="todolist-title">Javascript</h4>
                                <p class="todolist-description">À rendre pour la semaine prochaine</p>
                            </div>
                        </div>
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

    <script src="../index.js"></script>
</body>

</html>