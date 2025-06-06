<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu CROUS</title>
    <link rel="stylesheet" href="./Style/navbar.css">
    <link rel="stylesheet" href="./Style/menuCrous.css">
    <script src="./Typescript/index.js"></script>
    <script src="./Typescript/izly.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <script src="./Javascript/index.js"></script>

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
    <div class="upper-page-container">
        <div class="left-side">
            <a href="./index.php?action=accueil" class="suivi">Accueil </a><span class="suivi">> Crous et mon
                IZLY</span>
        </div>
        <div class="right-side">
            <h1 id="profil">Crous et mon IZLY</h1>
        </div>
    </div>

    <main class="container">
        <section class="menu-crous">
            <div class="menu-header-container">
                <div class="menu-header">
                    <h1>MENU CROUS</h1>
                    <p>de la semaine du 11 novembre 2024</p>
                </div>
                <div class="crous-option">
                    <div class="esiee"><span class="fleche">▶</span> ESIEE</div>
                    <div class="coppernic"><span class="fleche">▶</span> COPPERNIC</div>
                </div>
            </div>
            <div class="menu-days">
                <div class="menu-day" id="lundi">
                    <h3>Lundi</h3>
                    <div class="menu-item entree">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item plat">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item dessert">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> --</p>
                    </div>
                </div>
                <div class="menu-day" id="mardi">
                    <h3>Mardi</h3>
                    <div class="menu-item entree">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item plat">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item dessert">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> --</p>
                    </div>
                </div>
                <div class="menu-day" id="mercredi">
                    <h3>Mercredi</h3>
                    <div class="menu-item entree">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item plat">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item dessert">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> --</p>
                    </div>
                </div>
                <div class="menu-day" id="jeudi">
                    <h3>Jeudi</h3>
                    <div class="menu-item entree">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item plat">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item dessert">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> --</p>
                    </div>
                </div>
                <div class="menu-day" id="vendredi">
                    <h3>Vendredi</h3>
                    <div class="menu-item entree">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item plat">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> --</p>
                    </div>
                    <div class="menu-item dessert">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> --</p>
                    </div>
                </div>
            </div>
            <p class="note">Le menu est actualisé toutes les semaines</p>
        </section>
        <div class="izly_big_container">
            <section class="izly-account">
                <h2>Compte Izly</h2>
                <div class="semi-circle-container">
                    <div class="semi-circle-overlay"></div>
                    <div class="semi-circle"></div>
                    <div class="text-content">
                        <p class="amount">+ 5,00 €</p>
                        <p>Solde du 11/11/24</p>
                    </div>
                </div>
                <div class="qr-code">
                    <img src="./image/imageSite/qr-code.svg" alt="QR Code">
                </div>
            </section>
            <div class="button-container">
                <button id="buttonMenucrous">Rechargez votre compte Izly</button>
            </div>
        </div>
        <div class="overlay" id="overlay"></div>
        <div class="izly-paiement-container" id="izly-paiement-container">
            <button class="close-button">×</button>

            <!-- Texte supérieur couvrant toute la largeur -->
            <div class="upper-izly-text">
                <h2 id="recharger-izly">Recharger votre compte Izly</h2>
                <p style="text-align: left;">Mettez le montant que vous souhaitez ci-dessous</p>
            </div>

            <!-- Conteneur principal pour les deux sections -->
            <div class="flex-container">
                <!-- Conteneur pour le semi-cercle -->
                <div class="semi-circle-containers">
                    <div class="semi-circle"></div>
                    <div class="semi-circle-overlay"></div>
                    <div class="text-content">
                        <p id="izly-form-p">+ 00,00 €</p>
                    </div>
                </div>

                <!-- Conteneur pour le formulaire Izly -->
                <div class="izly-form-container">
                    <form id="izly-form">
                        <h2
                            style="text-align: left; font-weight: 400; border-bottom: 1px solid rgba(0, 0, 0, 0.369); padding-bottom: 8px; margin-bottom: 30px;">
                            Paiement
                        </h2>
                        <div class="pay-with-container">
                            <div class="pay-with">Payer Avec :</div>
                            <div class="option-payement">
                                <div class="pay-with-option">
                                    <label for="carte">Carte</label>
                                    <input type="radio" name="carte" id="carte">
                                </div>
                                <div class="pay-with-option">
                                    <label for="carte-enregistree">Carte Enregistrée</label>
                                    <input type="radio" name="carte" id="carte-enregistree">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Numéro de carte</label>
                            <input type="text" id="cardNumber" placeholder="1234 5678 9101 1121">
                            <span id="cardNumberError"></span>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="expirationDate">Date EXP</label>
                                <input type="text" id="expirationDate" placeholder="MM/YY">
                                <span id="expirationDateError"></span>
                            </div>
                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="text" id="cvc" placeholder="123">
                                <span id="cvcError"></span>
                            </div>
                        </div>
                        <div class="form-group save-card">
                            <label style="font-size: 14px;">Sauvegarder les détails de la carte</label>
                            <input type="checkbox">
                        </div>
                        <div class="button-container">
                            <button id="buttonMenucrous" type="submit" id="pay-ok">Payer 10 €</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>