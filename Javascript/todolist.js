document.addEventListener('DOMContentLoaded', () => {
// Sélection des éléments DOM des dates
const startDate = document.getElementById("starting-date");
const startMonth = document.getElementById("starting-month");
const finishDate = document.getElementById("finishing-date");
const finishMonth = document.getElementById("finishing-month");

// Fonction d'incrémentation de semaine
function changeWeek(daysToAdd) {
    let startDay = parseInt(startDate.textContent);
    let startMonthNum = parseInt(startMonth.textContent);
    let finishDay = parseInt(finishDate.textContent);
    let finishMonthNum = parseInt(finishMonth.textContent);

    // Ajoute les jours spécifiés (positif ou négatif)
    startDay += daysToAdd;
    finishDay += daysToAdd;

    // Fonction de gestion des jours et des mois
    function adjustDate(day, month) {
        if (day > 30) {
            day -= 30;
            month++;
        } else if (day < 1) {
            day += 30;
            month--;
        }
        if (month > 12) month = 1;  
        if (month < 1) month = 12;  
        return { day, month };
    }

    // Ajuste les dates
    const adjustedStart = adjustDate(startDay, startMonthNum);
    const adjustedFinish = adjustDate(finishDay, finishMonthNum);

    // Met à jour le DOM avec les nouvelles valeurs
    startDate.textContent = String(adjustedStart.day).padStart(2, "0");
    startMonth.textContent = String(adjustedStart.month).padStart(2, "0");
    finishDate.textContent = String(adjustedFinish.day).padStart(2, "0");
    finishMonth.textContent = String(adjustedFinish.month).padStart(2, "0");
}

// Ajouter des écouteurs d'événements pour les boutons
document.querySelector(".next-week").addEventListener("click", () => changeWeek(7));
document.querySelector(".previous-week").addEventListener("click", () => changeWeek(-7));
})