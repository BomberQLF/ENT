document.addEventListener("DOMContentLoaded", function () {
  var izlySecond = document.querySelector(".izly-paiement-container");
  var izlyFirst = document.querySelector(".izly_big_container");
  var button = document.querySelector(".button-container");
  var saveCard = document.querySelector(".save-card");
  var carteEnregistree = document.getElementById("carte-enregistree");
  var carte = document.getElementById("carte");
  var form = document.getElementById("izly-form");
  // Elements de validation des messages d'erreur
  var errorCardNumber = document.getElementById("cardNumberError");
  var errorExpirationDate = document.getElementById("expirationDateError");
  var errorCVC = document.getElementById("cvcError");
  var showPaiement = function (hide, show) {
    hide.style.display = "none";
    show.style.display = "block";
  };
  izlyFirst.style.display = "flex";
  izlySecond.style.display = "none";
  button.onclick = function () {
    showPaiement(izlyFirst, izlySecond);
  };
  var updateDisplay = function () {
    if (carteEnregistree.checked) {
      saveCard.style.display = "none";
    } else if (carte.checked) {
      saveCard.style.display = "block";
    }
  };
  carte.addEventListener("change", updateDisplay);
  carteEnregistree.addEventListener("change", updateDisplay);
  updateDisplay();
  var cardNumber = document.getElementById("cardNumber");
  var cardExpirationDate = document.getElementById("expirationDate");
  var cardCVC = document.getElementById("cvc");
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
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    var cardNumberValue = cardNumber.value;
    var expirationDate = cardExpirationDate.value;
    var cardCVCValue = cardCVC.value;
    var isValid = true;
    // Validation du numéro de carte
    if (!validateCardNumber(cardNumberValue)) {
      errorCardNumber.textContent =
        "Le numéro de carte doit contenir 16 chiffres.";
      isValid = false;
    } else {
      errorCardNumber.textContent = "";
    }
    // Validation de la date d'expiration
    if (!validationExpirationDate(expirationDate)) {
      errorExpirationDate.textContent =
        "La date d'expiration doit être au format MM/YY.";
      isValid = false;
    } else {
      errorExpirationDate.textContent = "";
    }
    // Validation du CVC
    if (!validationCVC(cardCVCValue)) {
      errorCVC.textContent = "Le CVC doit contenir 3 chiffres.";
      isValid = false;
    } else {
      errorCVC.textContent = "";
    }
    // Si tout est valide
    if (isValid) {
      console.log("Formulaire soumis avec succès !");
      form.submit();
    } else {
      console.log("Il y a des erreurs dans le formulaire.");
    }
  });

  // Fonction pour afficher le popup
  function showIzlyPayment() {
    console.log("Affichage du popup"); // Debug
    document.getElementById("overlay").style.display = "block"; 
    document.getElementById("izly-paiement-container").style.display = "flex"; 
    document.querySelector(".izly_big_container").style.display = "none"; 
  }

  // Fonction pour masquer le popup
  function hideIzlyPayment() {
    console.log("Fermeture du popup"); // Debug
    document.getElementById("overlay").style.display = "none"; 
    document.getElementById("izly-paiement-container").style.display = "none";
    document.querySelector(".izly_big_container").style.display = "block"; 
  }

  // Écouteur d'événements pour fermer le popup en cliquant en dehors
  document.getElementById("overlay").addEventListener("click", hideIzlyPayment);
  document
    .getElementById("buttonMenucrous")
    .addEventListener("click", showIzlyPayment);
});
