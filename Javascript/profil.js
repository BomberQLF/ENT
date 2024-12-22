document.addEventListener("DOMContentLoaded", () => {
    const editButton = document.getElementById('editProfileButton');
    const inputmodif = document.querySelector('.submit-boutton-input');

    const inputs = document.querySelectorAll('.form-container-profil input');
    const inputsmotdepasse = document.getElementById('changemotdepasseform');
    const passwordInput = document.getElementById('password');
    const passwordButton = document.getElementById('passwordButton');
    const fromprofil = document.getElementById('formprofil');

    editButton.addEventListener('click', () => {
        // Changer le texte du bouton et activer/désactiver les champs
        if (inputs[0].disabled) {
            editButton.style.display = 'none';
            inputmodif.style.display = 'block';

            passwordInput.style.display = 'none';
            passwordButton.style.display = 'block';

            inputs.forEach(input => {
                input.disabled = !input.disabled;
                input.style.border = '2px dotted #000000';
            });
        } else {
            passwordButton.style.display = 'none';
            passwordInput.style.display = 'block';
            

            inputs.forEach(input => {
                input.disabled = !input.disabled;
                input.style.border = '1px solid black';
            });
        }

    });
    // Ouvrir la popup lorsque le bouton de changement de mot de passe est cliqué
    passwordButton.addEventListener('click', () => {
        event.preventDefault();// Empêche la soumission du formulaire par défaut
        inputsmotdepasse.style.display = 'block';
        fromprofil.style.display = 'none';
    });
    document.getElementById('openPopupimgfichier').addEventListener('click', function () {
        document.getElementById('popupimgfichier').style.display = 'block';
      });
    
      document.querySelector('.closepopupimgfichier').addEventListener('click', function () {
        document.getElementById('popupimgfichier').style.display = 'none';
      });
      window.addEventListener('click', (event) => {
        if (event.target == popupimgfichier) {
            popupimgfichier.style.display = 'none';
        }
    
      });
});
