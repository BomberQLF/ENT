const selecteur = document.getElementById('absence-select');
const absencesDiv = document.querySelector('.Partie-absences');
const retardsDiv = document.querySelector('.Partie-retards');
const profilinfo = document.getElementById('profil');

selecteur.addEventListener('change', (event) => {
    const selectedValue = event.target.value;

    if (selectedValue === 'absence') {
        absencesDiv.style.display = 'block';
        retardsDiv.style.display = 'none';
        profilinfo.textContent = 'Mes absences'
    } else if (selectedValue === 'retard') {
        absencesDiv.style.display = 'none';
        retardsDiv.style.display = 'block';
        profilinfo.textContent = 'Mes retards'
    } else {
        absencesDiv.style.display = 'block';
        retardsDiv.style.display = 'none';
        profilinfo.textContent = 'Mes absences'
    }
});


// Script pour les checkbox (design)

    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Ajouter un événement sur chaque checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const row = this.closest('tr'); // Récupère la ligne <tr> de l'input checkbox
            const cells = row.querySelectorAll('td'); // Sélectionne toutes les cellules de la ligne

            // Applique ou enlève la couleur de fond bleu selon que le checkbox est coché ou non
            if (this.checked) {
                cells.forEach(cell => {
                    cell.style.backgroundColor = 'rgba(119, 126, 144, 0.25)'; 
                });
            } else {
                cells.forEach(cell => {
                    cell.style.backgroundColor = '';
                });
            }
        });
    });