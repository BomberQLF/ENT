
const menuButtons = document.querySelectorAll('.menu button');
const menucontenus = document.querySelectorAll('.menu-contenu');

// on fait une boucle sur les boutons
menuButtons.forEach(button => {

    button.addEventListener('click', () => {
        // on cache tous les contenus
        menuButtons.forEach(btn => btn.classList.remove('active'));
        // on ajoute la classe active au bouton cliqué
        button.classList.add('active');

        // on cache tous les contenus
        menucontenus.forEach(contenu => {
            contenu.style.display = 'none';
        });

        // on crée un objet qui contient les correspondances entre les ID des boutons et les ID des contenus
        const AllMenu = {
            copernic: 'menu-copernic',
            esiee: 'menu-esiee'
        };

        const contenuId = AllMenu[button.id];

        // on affiche le contenu correspondant au bouton cliqué
        document.getElementById(contenuId).style.display = 'block';
    });
});