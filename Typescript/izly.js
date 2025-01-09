document.addEventListener("DOMContentLoaded", function () {
    var izlySecond = document.querySelector(".izly-paiement-container");
    var izlyFirst = document.querySelector(".izly_big_container");
    var button = document.querySelector(".button-container");
    var saveCard = document.querySelector(".save-card");
    var carteEnregistree = document.getElementById("carte-enregistree");
    var carte = document.getElementById("carte");
    var form = document.getElementById('izly-form');
    var closeButton = document.querySelector('.close-button');
    // Elements de validation des messages d'erreur
    var errorCardNumber = document.getElementById('cardNumberError');
    var errorExpirationDate = document.getElementById('expirationDateError');
    var errorCVC = document.getElementById('cvcError');
    var showPaiement = function (hide, show) {
        hide.style.display = "none";
        show.style.display = "block";
    };
    izlyFirst.style.display = "flex";
    izlySecond.style.display = "none";
    button.onclick = function () {
        showPaiement(izlyFirst, izlySecond);
    };
    // Ajoute la logique pour fermer le conteneur
    closeButton.addEventListener('click', function () {
        izlySecond.style.display = 'none';
        izlyFirst.style.display = 'flex';
    });
    var updateDisplay = function () {
        if (carteEnregistree.checked) {
            saveCard.style.display = "none";
        }
        else if (carte.checked) {
            saveCard.style.display = "block";
        }
    };

    const getURLParameter = (name) => {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    };

    if (getURLParameter("action") === "menuCrous" && getURLParameter("showPopup") === "true") {
        izlySecond.style.display = "block";
        izlyFirst.style.display = "none";
    } else {
        izlySecond.style.display = "none";
        izlyFirst.style.display = "block";
    }
    
    carte.addEventListener("change", updateDisplay);
    carteEnregistree.addEventListener("change", updateDisplay);
    updateDisplay();
    var cardNumber = document.getElementById('cardNumber');
    var cardExpirationDate = document.getElementById('expirationDate');
    var cardCVC = document.getElementById('cvc');
    var validateCardNumber = function (number) {
        var pattern = /^[0-9]{16}$/;
        return pattern.test(number);
    };
    var validationExpirationDate = function (date) {
        var pattern = /^(0[1-9]|1[0-2])\/?(\d{2})$/;
        return pattern.test(date);
    };
    var validationCVC = function (cvc) {
        var pattern = /^[0-9]{3}$/;
        return pattern.test(cvc);
    };
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        var cardNumberValue = cardNumber.value;
        var expirationDate = cardExpirationDate.value;
        var cardCVCValue = cardCVC.value;
        var isValid = true;
        // Validation du numéro de carte
        if (!validateCardNumber(cardNumberValue)) {
            errorCardNumber.textContent = "Le numéro de carte doit contenir 16 chiffres.";
            isValid = false;
        }
        else {
            errorCardNumber.textContent = "";
        }
        // Validation de la date d'expiration
        if (!validationExpirationDate(expirationDate)) {
            errorExpirationDate.textContent = "La date d'expiration doit être au format MM/YY.";
            isValid = false;
        }
        else {
            errorExpirationDate.textContent = "";
        }
        // Validation du CVC
        if (!validationCVC(cardCVCValue)) {
            errorCVC.textContent = "Le CVC doit contenir 3 chiffres.";
            isValid = false;
        }
        else {
            errorCVC.textContent = "";
        }
        // Si tout est valide
        if (isValid) {
            console.log("Formulaire soumis avec succès !");
            form.submit();
        }
        else {
            console.log("Il y a des erreurs dans le formulaire.");
        }
    });
    var esieeDiv = document.querySelector(".esiee");
    var coppernicDiv = document.querySelector(".coppernic");
    // Menus spécifiques pour chaque établissement
    var esieeMenu = {
        entree: "Tomates",
        plat: "Bolognaise",
        dessert: "Tarte aux pommes",
    };
    var coppernicMenu = {
        entree: "Salade verte",
        plat: "Poulet rôti",
        dessert: "Crème brûlée",
    };
    // Fonction pour mettre à jour les menus
    var updateMenu = function (menuData) {
        var days = ["lundi", "mardi", "mercredi", "jeudi", "vendredi"];
        days.forEach(function (dayId) {
            var dayElement = document.getElementById(dayId);
            var entreeElement = dayElement.querySelector(".entree p");
            var platElement = dayElement.querySelector(".plat p");
            var dessertElement = dayElement.querySelector(".dessert p");
            // Mise à jour des contenus
            entreeElement.innerHTML = "<strong class=\"strong-menu\">Entr\u00E9e :</strong><br><br> ".concat(menuData.entree);
            platElement.innerHTML = "<strong class=\"strong-menu\">Plat :</strong><br><br> ".concat(menuData.plat);
            dessertElement.innerHTML = "<strong class=\"strong-menu\">Dessert :</strong><br><br> ".concat(menuData.dessert);
        });
    };
    // Fonction pour gérer la classe active
    var setActiveMenu = function (activeElement, otherElement) {
        activeElement.classList.add("active-menu");
        otherElement.classList.remove("active-menu");
    };
    // Par défaut, afficher le menu de l'ESIEE et ajouter la classe active
    updateMenu(esieeMenu);
    setActiveMenu(esieeDiv, coppernicDiv);
    // Ajout des événements sur les divs
    esieeDiv.addEventListener("click", function () {
        updateMenu(esieeMenu);
        setActiveMenu(esieeDiv, coppernicDiv);
    });
    coppernicDiv.addEventListener("click", function () {
        updateMenu(coppernicMenu);
        setActiveMenu(coppernicDiv, esieeDiv);
    });
});
