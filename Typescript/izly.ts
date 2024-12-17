document.addEventListener("DOMContentLoaded", () => {
  const izlySecond = document.querySelector(".izly-paiement-container") as HTMLDivElement;
  const izlyFirst = document.querySelector(".izly_big_container") as HTMLElement;
  const button = document.querySelector(".button-container") as HTMLDivElement;
  const saveCard = document.querySelector(".save-card") as HTMLDivElement;
  const carteEnregistree = document.getElementById("carte-enregistree") as HTMLInputElement;
  const carte = document.getElementById("carte") as HTMLInputElement;
  const form = document.getElementById('izly-form') as HTMLFormElement;
  const closeButton = document.querySelector('.close-button') as HTMLButtonElement;

  // Elements de validation des messages d'erreur
  const errorCardNumber = document.getElementById('cardNumberError') as HTMLSpanElement;
  const errorExpirationDate = document.getElementById('expirationDateError') as HTMLSpanElement;
  const errorCVC = document.getElementById('cvcError') as HTMLSpanElement;

  const showPaiement = (hide: HTMLElement, show: HTMLElement): void => {
    hide.style.display = "none";
    show.style.display = "block";
  };

  izlyFirst.style.display = "flex";
  izlySecond.style.display = "none";

  button.onclick = () => {
    showPaiement(izlyFirst, izlySecond);
  };

  // Ajoute la logique pour fermer le conteneur
  closeButton.addEventListener('click', () => {
    izlySecond.style.display = 'none';
    izlyFirst.style.display = 'flex';
  });

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

  const cardNumber = document.getElementById('cardNumber') as HTMLInputElement;
  const cardExpirationDate = document.getElementById('expirationDate') as HTMLInputElement;
  const cardCVC = document.getElementById('cvc') as HTMLInputElement;

  const validateCardNumber = (number: string): boolean => {
    const pattern = /^[0-9]{16}$/;
    return pattern.test(number);
  };

  const validationExpirationDate = (date: string): boolean => {
    const pattern = /^(0[1-9]|1[0-2])\/?(\d{2})$/; 
    return pattern.test(date);
  };

  const validationCVC = (cvc: string): boolean => {
    const pattern = /^[0-9]{3}$/; 
    return pattern.test(cvc);
  };

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cardNumberValue = cardNumber.value;
    const expirationDate = cardExpirationDate.value;
    const cardCVCValue = cardCVC.value;

    let isValid = true;

    // Validation du numéro de carte
    if (!validateCardNumber(cardNumberValue)) {
      errorCardNumber.textContent = "Le numéro de carte doit contenir 16 chiffres.";
      isValid = false;
    } else {
      errorCardNumber.textContent = ""; 
    }

    // Validation de la date d'expiration
    if (!validationExpirationDate(expirationDate)) {
      errorExpirationDate.textContent = "La date d'expiration doit être au format MM/YY.";
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

  const esieeDiv = document.querySelector(".esiee") as HTMLElement;
  const coppernicDiv = document.querySelector(".coppernic") as HTMLElement;

  // Menus spécifiques pour chaque établissement
  const esieeMenu = {
      entree: "Tomates",
      plat: "Bolognaise",
      dessert: "Tarte aux pommes",
  };

  const coppernicMenu = {
      entree: "Salade verte",
      plat: "Poulet rôti",
      dessert: "Crème brûlée",
  };

  // Fonction pour mettre à jour les menus
  const updateMenu = (menuData: { entree: string; plat: string; dessert: string }) => {
      const days = ["lundi", "mardi", "mercredi", "jeudi", "vendredi"];
      days.forEach((dayId) => {
          const dayElement = document.getElementById(dayId) as HTMLElement;
          const entreeElement = dayElement.querySelector(".entree p") as HTMLElement;
          const platElement = dayElement.querySelector(".plat p") as HTMLElement;
          const dessertElement = dayElement.querySelector(".dessert p") as HTMLElement;

          // Mise à jour des contenus
          entreeElement.innerHTML = `<strong class="strong-menu">Entrée :</strong><br><br> ${menuData.entree}`;
          platElement.innerHTML = `<strong class="strong-menu">Plat :</strong><br><br> ${menuData.plat}`;
          dessertElement.innerHTML = `<strong class="strong-menu">Dessert :</strong><br><br> ${menuData.dessert}`;
      });
  };

  // Fonction pour gérer la classe active
  const setActiveMenu = (activeElement: HTMLElement, otherElement: HTMLElement) => {
      activeElement.classList.add("active-menu");
      otherElement.classList.remove("active-menu");
  };

  // Par défaut, afficher le menu de l'ESIEE et ajouter la classe active
  updateMenu(esieeMenu);
  setActiveMenu(esieeDiv, coppernicDiv);

  // Ajout des événements sur les divs
  esieeDiv.addEventListener("click", () => {
      updateMenu(esieeMenu);
      setActiveMenu(esieeDiv, coppernicDiv);
  });

  coppernicDiv.addEventListener("click", () => {
      updateMenu(coppernicMenu);
      setActiveMenu(coppernicDiv, esieeDiv);
  });

});