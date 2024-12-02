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

// =============== POPUP ==================
// Sélection des éléments DOM de la popup

const overlayAddTask = document.getElementById("overlay-add-task");
    const addTaskContainer = document.getElementById("add-task-container");
    const closePopupButton = document.getElementById("close-popup");
    
    // Fonction pour afficher la popup
    function showAddTaskPopup() {
        overlayAddTask.style.display = "block";
        addTaskContainer.style.display = "flex";
        addTaskContainer.style.gap = "2rem";
    }

    // Fonction pour cacher la popup
    function hideAddTaskPopup() {
        overlayAddTask.style.display = "none";
        addTaskContainer.style.display = "none";
    }

    // Écouteur d'événement pour le bouton d'annulation
    closePopupButton.addEventListener("click", hideAddTaskPopup);
    
    // Optionnel : Afficher la popup lorsque le bouton d'ajout de tâche est cliqué
    document.getElementById("add-todo-container").addEventListener("click", showAddTaskPopup);

    // Sélection des éléments nécessaires
const modifyTaskButton = document.querySelector('.fa-pen-nib'); // Assurez-vous que ce sélecteur correspond à votre bouton
const modifyTaskContainer = document.getElementById('modify-task-container');
const overlayModifyTask = document.getElementById('overlay-add-task');
const closePopupButtonMod = document.getElementById('close-popup-mod');

// Fonction pour afficher le popup
function showModifyTaskPopup() {
    modifyTaskContainer.style.display = 'block';
    overlayModifyTask.style.display = 'block';
}

// Fonction pour masquer le popup
function hideModifyTaskPopup() {
    modifyTaskContainer.style.display = 'none';
    overlayModifyTask.style.display = 'none';
}

// Événement pour afficher le popup lorsque le bouton est cliqué
modifyTaskButton.addEventListener('click', showModifyTaskPopup);

// Événement pour masquer le popup lorsque le bouton "Annuler" est cliqué
closePopupButtonMod.addEventListener('click', hideModifyTaskPopup);

// Événement pour masquer le popup lorsque l'overlay est cliqué
overlayModifyTask.addEventListener('click', hideModifyTaskPopup);
})