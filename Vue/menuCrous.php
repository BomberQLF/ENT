<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu CROUS</title>
    <link rel="stylesheet" href="../Style/navbar.css">
    <link rel="stylesheet" href="../Style/menuCrous.css">
    <script src="../index.js"></script>
    <script src="./izly.js"></script>
    <link rel="stylesheet" href="">
</head>

<body>
    <nav class="navbar">
        <div id="burger-icon">&#9776;</div> <!-- Icône burger -->
        <ul>
            <li class="left"><a href="#">Home</a></li>
            <div class="center">
                <li class="has-submenu">
                    <a href="#">Mon suivi</a>
                    <ul class="submenu">
                        <li><a href="#">Notes</a></li>
                        <li><a href="#">Évaluation</a></li>
                        <li><a href="#">To do list</a></li>
                        <li><a href="#">Absences et retards</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Planning et réservation</a>
                    <ul class="submenu">
                        <li><a href="#">Emploi du temps</a></li>
                        <li><a href="#">Salles et Matériels</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Vie étudiante</a>
                    <ul class="submenu">
                        <li><a href="#">Crous et mon IZLY</a></li>
                        <li><a href="#">Événements</a></li>
                    </ul>
                </li>
                <li><a href="#">Messagerie</a></li>
            </div>
            <li class="right">
                <a href="#">Bonjour, Tom <img src="../image/uploads/photo_default.png" alt="Photo de profil"></a>
            </li>
        </ul>
    </nav>
    <main class="container">
        <section class="menu-crous">
            <div class="menu-header">
                <h1>MENU CROUS</h1>
                <p>de la semaine du 11 novembre 2024</p>
            </div>
            <div class="menu-days">
                <div class="day">
                    <h2>Lundi</h2>
                    <div class="menu-item">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> Tomates</p>
                    </div>
                    <div class="menu-item">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> Bolognaise</p>
                    </div>
                    <div class="menu-item">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> Tarte aux pommes</p>
                    </div>
                </div>
                <div class="day">
                    <h2>Lundi</h2>
                    <div class="menu-item">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> Tomates</p>
                    </div>
                    <div class="menu-item">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> Bolognaise</p>
                    </div>
                    <div class="menu-item">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> Tarte aux pommes</p>
                    </div>
                </div>
                <div class="day">
                    <h2>Lundi</h2>
                    <div class="menu-item">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> Tomates</p>
                    </div>
                    <div class="menu-item">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> Bolognaise</p>
                    </div>
                    <div class="menu-item">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> Tarte aux pommes</p>
                    </div>
                </div>
                <div class="day">
                    <h2>Lundi</h2>
                    <div class="menu-item">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> Tomates</p>
                    </div>
                    <div class="menu-item">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> Bolognaise</p>
                    </div>
                    <div class="menu-item">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> Tarte aux pommes</p>
                    </div>
                </div>
                <div class="day">
                    <h2>Lundi</h2>
                    <div class="menu-item">
                        <span class="entree-bg"></span>
                        <p><strong class="strong-menu">Entrée :</strong><br><br> Tomates</p>
                    </div>
                    <div class="menu-item">
                        <span class="plat-bg"></span>
                        <p><strong class="strong-menu">Plat :</strong><br><br> Bolognaise</p>
                    </div>
                    <div class="menu-item">
                        <span class="dessert-bg"></span>
                        <p><strong class="strong-menu">Dessert :</strong><br><br> Tarte aux pommes</p>
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
                    <img src="../image/imageSite/qr-code.svg" alt="QR Code">
                </div>
            </section>
            <div class="button-container">
                <button>Rechargez votre compte Izly</button>
            </div>
        </div>
        <div class="izly-paiement-container">
            <div class="izly-paiement">
                <h2 id="recharger-izly">Recharger votre compte Izly</h2>
                <div class="semi-circle-container">
                    <div class="semi-circle"></div>
                    <div class="semi-circle-overlay"></div>
                    <div class="text-content">
                        <p id="izly-form-p">+ 10,00 €</p>
                    </div>
                </div>
                <form>
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
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="expirationDate">Date EXP</label>
                            <input type="text" id="expirationDate" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" placeholder="123">
                        </div>
                    </div>
                    <div class="form-group save-card">
                        <label>
                            <input type="checkbox">
                            Sauvegarder les détails de la carte
                        </label>
                    </div>
                    <div class="button-container">
                        <button type="submit">Payer 10 €</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>