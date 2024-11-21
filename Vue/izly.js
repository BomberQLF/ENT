document.addEventListener("DOMContentLoaded", () => {
  const izlySecond = document.querySelector(".izly-paiement-container");
  const izlyFirst = document.querySelector(".izly_big_container");
  const button = document.querySelector(".button-container");
  const saveCard = document.querySelector(".save-card");
  const carteEnregistree = document.getElementById("carte-enregistree");
  const carte = document.getElementById("carte");
  const form = document.getElementById('izly-form'); 

  izlyFirst.style.display = "flex";
  izlySecond.style.display = "none";

  const showPaiement = (hide, show) => {
    hide.style.display = "none";
    show.style.display = "block";
  };

  button.onclick = () => {
    showPaiement(izlyFirst, izlySecond);
  };

  const updateDisplay = () => {
    if (carteEnregistree.checked) {
      saveCard.style.display = "none";
    } else if (carte.checked) {
      saveCard.style.display = "block";
    }
  };

  carte.addEventListener("change", updateDisplay);
  carteEnregistree.addEventListener("change", updateDisplay);
  updateDisplay();

  const cardNumber = document.getElementById('cardNumber');
  const cardExpirationDate = document.getElementById('expirationDate');
  const cardCVC = document.getElementById('cvc');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cardNumberValue = cardNumber.value;
    const cardExpirationDateValue = cardExpirationDate.value;
    const cardCVCValue = cardCVC.value;

    // A CONTINUER POUR AFFICHER DES MESSAGES D'ERREUR SI LE CONTENU N'EST PAS DU TYPEOF VOULU - TOM
  })
});
