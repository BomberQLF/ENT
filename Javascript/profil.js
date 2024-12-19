document.addEventListener("DOMContentLoaded", () => {
    const editButton = document.getElementById('editProfileButton');
    const inputs = document.querySelectorAll('.form-container-profil input');
    const inputsmotdepasse = document.querySelector('.form-container-profilmotdepasse');
    const passwordInput = document.getElementById('password');
    const passwordButton = document.getElementById('passwordButton');
    const passwordPopup = document.getElementById('changemotdepasseform');
    const fromprofil = document.getElementById('formprofil');

    editButton.addEventListener('click', () => {
        // Changer le texte du bouton et activer/désactiver les champs
        if (inputs[0].disabled) {
            editButton.textContent = 'Confirmer les modifications';
            passwordButton.style.display = 'block';
            passwordInput.style.display = 'none';
            inputs.forEach(input => {
                input.disabled = !input.disabled;
                input.style.border = '2px dotted #000000';
            });
        } else {
            editButton.textContent = 'Modifier votre profil';
            passwordButton.style.display = 'none';
            passwordInput.style.display = 'block';
            inputs.forEach(input => {
                input.disabled = !input.disabled;
                input.style.border = '1px solid black';
            });
            if (inputsmotdepasse.style.display === 'block') {
                fromprofil.style.display = 'block';
                inputsmotdepasse.style.display = 'none';
            }
        }

    });
    // Ouvrir la popup lorsque le bouton de changement de mot de passe est cliqué
    passwordButton.addEventListener('click', () => {
        passwordPopup.style.display = 'block';
        formprofil.style.display = 'none';

    });
});
