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