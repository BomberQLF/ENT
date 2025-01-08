<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justification d'absences et retards</title>
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/absences.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <style>
        .justifier-absences-section {
            display:
                <?= isset($_GET['success']) && $_GET['success'] === 'true' ? 'none' : ($type === 'absence' ? 'block' : 'none') ?>
            ;
        }

        .justifier-retards-section {
            display:
                <?= isset($_GET['success']) && $_GET['success'] === 'true' ? 'none' : ($type === 'retard' ? 'block' : 'none') ?>
            ;
        }

        .finilisationjustification {
            width: 100%;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            display:
                <?= isset($_GET['success']) && $_GET['success'] === 'true' ? 'flex' : 'none' ?>
            ;
        }

        .confirmation-container {
            text-align: center;
            padding: 2rem;
            border-radius: 8px;
        }

        .confirmation-icon {
            margin-bottom: 1rem;
            font-size: 8rem;
            color: var(--main-color);
        }

        .finilisationjustification h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .finilisationjustification p {
            font-size: 1rem;
            margin-bottom: 2rem;
        }
    </style>
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
    <section class="justifier-absences-section">
        <div class="upper-page-container">
            <div class="left-side">
                <a href="./index.php?action=accueil" class="suivi">Accueil </a><a href="./index.php?action=absence"
                    class="suivi">> Absences et retards </a><span class="suivi">> Justifier mes absences</span>
            </div>
            <div class="right-side">
                <h1 id="profil">Justifier mes absences</h1>
            </div>
        </div>
        <div class="justifier-absences">
            <p>
                Vous y êtes presque ! Vous avez sélectionné les absences ci-dessous. Vérifiez-les attentivement avant de
                continuer afin de pouvoir
                mettre votre justificatif.
            </p>
            <p style="color:red">
                Attention : si vous sélectionnez plusieurs absences à la fois, il est attendu que vous fournissiez un
                justificatif unique couvrant l'ensemble de ces absences.
            </p>
            <form action="index.php?action=process_justification" enctype="multipart/form-data" method="POST">
                <div class="upload-box">
                    <div class="upload-icon">
                        <i class="fa fa-file-upload"></i>
                    </div>
                    <p>Joindre votre dossier ci-dessus</p>
                    <small>Formats acceptés : PDF, PNG, JPEG</small>
                    <input type="file" id="file" class="file-input" name="file" accept=".pdf,.png,.jpeg,.jpg"
                        required />
                    <input type="hidden" name="selected_absences_retards"
                        value="<?= implode(',', array_column($absencesRetards, 'id_absence_retard')) ?>">
                </div>
                <!-- Tableau des absences -->
                <table>
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Professeur</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($absencesRetards as $absence) {
                            $date = new DateTime($absence['date']);
                            $formattedDate = $date->format('d/m/Y');
                            echo '<tr>
                                        <td>' . $absence['matiere'] . '</td>
                                        <td>' . $absence['professeur'] . '</td>
                                        <td>' . $absence['duree_minutes'] . " h" . '</td>
                                        <td>' . $formattedDate . '</td>
                                    </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Navigation -->
                <div class="navigation">
                    <a href="./index.php?action=absence" class="bouttonbarre" id="back-btn">Revenir en arrière</a>
                    <button class="bouttonbarre validate" type="submit" id="validate-btn">Valider</button>
                </div>
            </form>
        </div>
    </section>

    <section class="justifier-retards-section">
        <div class="upper-page-container">
            <div class="left-side">
                <a href="./index.php?action=accueil" class="suivi">Accueil </a><a href="./index.php?action=absence"
                    class="suivi">> Absences et retards </a><span class="suivi">> Justifier mes retards</span>
            </div>
            <div class="right-side">
                <h1 id="profil">Justifier mes retards</h1>
            </div>
        </div>
        <div class="justifier-absences">
            <p>
                Vous y êtes presque ! Vous avez sélectionné les retards ci-dessous. Vérifiez-les attentivement avant de
                continuer afin de pouvoir
                mettre votre justificatif.
            </p>
            <p style="color:red">
                Attention : si vous sélectionnez plusieurs retards à la fois, il est attendu que vous fournissiez un
                justificatif unique couvrant l'ensemble de ces retards.
            </p>
            <form action="index.php?action=process_justification" enctype="multipart/form-data" method="POST">
                <div class="upload-box">
                    <div class="upload-icon">
                        <i class="fa fa-file-upload"></i>
                    </div>
                    <p>Joindre votre dossier ci-dessus</p>
                    <small>Formats acceptés : PDF, PNG, JPEG</small>
                    <input type="file" id="file" class="file-input" name="file" accept=".pdf,.png,.jpeg,.jpg"
                        required />
                    <input type="hidden" name="selected_absences_retards"
                        value="<?= implode(',', array_column($absencesRetards, 'id_absence_retard')) ?>">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Professeur</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($absencesRetards as $retard) {
                            $date = new DateTime($retard['date']);
                            $formattedDate = $date->format('d/m/Y');
                            echo '<tr>
                            <td>' . $retard['matiere'] . '</td>
                            <td>' . $retard['professeur'] . '</td>
                            <td>' . $retard['duree_minutes'] . " h" . '</td>
                            <td>' . $formattedDate . '</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="navigation">
                    <a href="./index.php?action=absence" class="bouttonbarre" id="back-btn">Revenir en arrière</a>
                    <button class="bouttonbarre validate" type="submit" id="validate-btn">Valider</button>
                </div>
        </div>
    </section>

    <section class="finilisationjustification">
        <div class="confirmation-container">
            <div class="confirmation-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>Votre justification a bien été envoyée</h1>
            <p>Vous recevrez un message de confirmation sous peu. Si ce n’est pas le cas, veuillez contacter le
                secrétariat.</p>
            <a class="bouttonversaccueil" href="./index.php?action=accueil">Revenir à l'accueil</a>
        </div>
    </section>
    <script src="./Javascript/index.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    // permet d'empêcher le rechargement de la page
                    event.preventDefault();
                    const formData = new FormData(form);
                    // envoi de la requête
                    fetch(form.action, {
                        method: 'POST',
                        body: formData
                        // on récupère la réponse de la requête
                    }).then(response => response.json())
                        .then(data => {
                            // si la justification a bien été envoyée on cache les sections de justification et on affiche la section de confirmation
                            if (data.success) {
                                document.querySelector('.justifier-absences-section').style.display = 'none';
                                document.querySelector('.justifier-retards-section').style.display = 'none';
                                document.querySelector('.finilisationjustification').style.display = 'flex';
                            } else {
                                alert('Erreur lors de l\'envoi de la justification');
                            }
                        })
                });
            });
        });
    </script>
</body>

</html>