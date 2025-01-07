document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.ftr');
    const sections = {
        notes: document.querySelector('.notes-container'),
        todolist: document.querySelector('.todolist-container'),
        absences: document.querySelector('.absences-container'),
        utilisateurs: document.querySelector('.all-users-container'),
        messaging: document.querySelector('.messaging-container')
    };
    console.log('backOffice.js is loaded');

    // Fonction pour cacher toutes les sections
    function hideAllSections() {
        for (const section of Object.values(sections)) {
            if (section) {
                section.classList.add('hidden');
            }
        }
    }

    // Écoutez les clics sur les boutons de filtre
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            hideAllSections(); // Cacher toutes les sections
            const filterType = button.textContent.toLowerCase();

            console.log(`Filtre cliqué : ${filterType}`);

            // Afficher la section correspondante
            if (sections[filterType]) {
                sections[filterType].classList.remove('hidden');
                console.log(`Affichage de la section : ${filterType}`);
            } else {
                console.log(`Aucune section trouvée pour : ${filterType}`);
            }
        });
    });
});