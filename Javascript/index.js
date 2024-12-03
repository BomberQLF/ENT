document.addEventListener('DOMContentLoaded', () => {

  // Script de la barre de navigation =================================================================================
  const hamburger = document.getElementById('hamburger');
  const sideMenu = document.getElementById('sideMenu');
  const submenuLinks = document.querySelectorAll('.has-submenu > a');

  // Ouvrir/fermer le menu latéral
  hamburger.addEventListener('click', () => {
    sideMenu.classList.toggle('open');
    hamburger.classList.toggle('open');
  });

  // Ouvrir/fermer les sous-menus
  submenuLinks.forEach(link => {
    // Ajoute un écouteur d'événement pour chaque lien principal de sous-menu
    link.addEventListener('click', (e) => {
      // Empêche le comportement par défaut du lien (navigation vers une autre page)
      e.preventDefault();

      const parent = link.parentElement;

      // Fermer tous les autres sous-menus
      document.querySelectorAll('.has-submenu').forEach(submenu => {
        // si le sous-menu actuel n'est pas le même que le parent du lien cliqué alors on le ferme
        if (submenu !== parent) {
          submenu.classList.remove('open');
        }
      });

      // Ouvrir/fermer le sous-menu actuel
      parent.classList.toggle('open');
    });
  });
  // script de la pop pup =================================================================================
  document.getElementById('openPopup').addEventListener('click', function () {
    document.getElementById('popup').style.display = 'block';
  });

  document.querySelector('.closepopup').addEventListener('click', function () {
    document.getElementById('popup').style.display = 'none';
  });

  // =================================================================================

})