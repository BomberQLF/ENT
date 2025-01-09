const events = [
    {
        titre: "Le Village de Noël",
        organisateur: "BDE Community",
        date: "Samedi 2 Décembre 2024",
        heure: "19:00 - 23:00",
        lieu: "Zénith de La Villette",
        description: "Envie de plonger dans la magie de Noël avant les vacances ? Le Village de Noël Étudiant vous invite à vivre un moment féérique et chaleureux en décembre ! <br><br> Participez à des ateliers créatifs uniques ! Fabriquez des cartes de Noël pour des enfants hospitalisés ou des personnes âgées isolées, ou réalisez des décorations et petits cadeaux DIY à offrir ou garder en souvenir. Et que dire de l’espace gourmand ? Venez découvrir un buffet participatif mettant à l’honneur les saveurs de Noël du monde entier, avec des stands de pâtisseries, chocolats chauds et autres délices typiques.<br><br> Des animations et surprises pour tous ! Testez vos connaissances au quizz de Noël, montrez vos plus beaux pulls moches dans notre concours hilarant ou échangez des cadeaux lors du Secret Santa. Pour couronner le tout, profitez d’un spectacle étudiant haut en couleurs : chants, musique, danse… sans oublier une collecte solidaire de jouets et vêtements au profit d’associations locales. <br><br> Ne manquez pas ce moment magique et convivial ! Rejoignez-nous pour célébrer la diversité, l’entraide et l’esprit de Noël comme jamais auparavant. On vous attend nombreux pour cette aventure inoubliable !",
        image: "./image/imageSite/evenement/village_noel.jpg",
        suivi: "> Village de noel",
        prix: "14€",
        img_maps: "./image/imageSite/evenement/noel_maps.jpg"
    },
    {
        titre: "Hallowen",
        organisateur: "BDE Community",
        date: "Samedi 31 Octobre 2024",
        heure: "19:00 - 00:00",
        lieu: "Paris",
        description: "Prêt(e) à vivre une soirée effrayante ? La soirée Halloween à Paris est l'événement à ne pas manquer pour célébrer la nuit la plus terrifiante de l'année. <br><br> Sortez vos plus beaux costumes et préparez-vous à frissonner dans une ambiance macabre avec des spectacles surprenants, des animations horrifiques et une piste de danse endiablée. Entre monstres, créatures et sorcières, l’atmosphère sera effrayante à souhait ! Ne manquez pas le concours du meilleur costume pour repartir avec des prix fantastiques. <br><br> Vivre une expérience de folie, pleine de frissons et de fun !",
        image: "./image/imageSite/evenement/hallowen.jpg",
        suivi: "> Hallowen",
        prix: "10€",
        img_maps: "./image/imageSite/evenement/paris_maps.jpg"
    },
    {
        titre: "Conférence Accessibilité",
        organisateur: "Université Gustave Eiffel",
        date: "Mardi 7 Novembre 2024",
        heure: "13:00 - 14:00",
        lieu: "Campus UGE Paris",
        description: "Comment rendre notre société plus inclusive et accessible à tous ? <br><br> La conférence Accessibilité, organisée sur le campus UGE Paris, sera l'occasion de répondre à cette question cruciale et d’explorer ensemble des solutions concrètes pour construire un monde plus juste et égalitaire. Des experts en accessibilité, des représentants d’associations, des chercheurs et des personnes en situation de handicap partageront leurs expériences et leurs visions pour améliorer l’accessibilité dans tous les aspects de notre quotidien, de l’urbanisme à l’éducation, en passant par le numérique et la culture. <br><br> Au programme : des ateliers pratiques, des témoignages inspirants et des discussions sur les dernières avancées législatives et technologiques pour favoriser l’inclusion. Vous pourrez ainsi comprendre les défis rencontrés par les personnes en situation de handicap et comment nous pouvons tous, à notre échelle, contribuer à un environnement plus inclusif. <br><br> L’objectif de cette conférence est de sensibiliser le plus grand nombre aux enjeux de l’accessibilité, tout en offrant un espace d'échange et de réflexion pour imaginer un avenir où chacun a sa place, quels que soient ses besoins spécifiques.<br><br>Rejoignez-nous pour ce moment de partage, de solidarité et d’action !",
        image: "./image/imageSite/evenement/conference.jpg",
        suivi: "> Conférence Accessibilité",
        prix: "Gratuit",
        img_maps: "./image/imageSite/evenement/campus_maps.jpg"
    },
    {
        titre: "Comment se vendre ?",
        organisateur: "Université Gustave Eiffel",
        date: "Jeudi 29 Novembre 2024",
        heure: "18:00 - 20:00",
        lieu: "Essie Paris",
        description: "Vous avez un entretien important ou une présentation à faire et vous ne savez pas comment vous vendre efficacement ? <br><br> Ne vous inquiétez pas, la conférence 'Comment se vendre ?' organisée à Sciences Po Paris est là pour vous guider dans l’art de la communication et de l’auto-promotion professionnelle. Cette conférence vous fournira des astuces et des techniques éprouvées pour réussir vos entretiens d’embauche, vos présentations orales et vos négociations professionnelles.<br><br> Vous apprendrez à valoriser vos compétences, à mettre en avant vos qualités et à maîtriser l’art de l’argumentation, tout en restant authentique et confiant. Les experts en communication et en ressources humaines partageront avec vous des conseils pratiques pour faire une première impression mémorable et marquer des points tout au long de vos échanges.<br><br> La conférence sera suivie d'une session de questions-réponses où vous pourrez poser vos interrogations spécifiques à des professionnels du domaine.<br><br> Ce sera une occasion unique de perfectionner vos techniques et d'acquérir des compétences précieuses pour réussir dans votre vie professionnelle.",
        image: "./image/imageSite/evenement/comment_se_vendre.jpg",
        suivi: "> Comment se vendre ?",
        prix: "gratuit",
        img_maps: "./image/imageSite/evenement/campus_maps.jpg"
    },
    {
        titre: "Tournoi de jeux vidéos",
        organisateur: "BDE Esports",
        date: "Vendredi 15 Janvier 2025",
        heure: "19:00 - 23:00",
        lieu: "En distanciel",
        description: "Les compétitions de jeux vidéo n’ont jamais été aussi excitantes ! Le tournoi en ligne organisé par le BDE Esports est l’occasion rêvée de tester vos réflexes et vos compétences face à des joueurs du monde entier. Que vous soyez un(e) gamer expérimenté(e) ou un(e) novice, rejoignez-nous pour une série de matchs palpitants où l’adrénaline et la stratégie seront au rendez-vous. <br><br>Au programme : des tournois sur vos jeux préférés, avec des brackets et des récompenses pour les meilleurs joueurs. De plus, l’événement sera ponctué de mini-jeux et d'animations pour faire de chaque match un véritable moment de fun et de convivialité. Si vous remportez la victoire, des prix excitants vous attendent ! <br><br>Que vous soyez compétiteur ou simple spectateur, cet événement vous promet une soirée inoubliable, pleine de surprises et d’émotions fortes !",
        image: "./image/imageSite/evenement/tournoi.jpg",
        suivi: "> tournoi jeux vidéos",
        prix: "gratuit",
    },
    {
        titre: "Conférence Climat",
        organisateur: "BDE Écologie",
        date: "mercredi 3 février 2025",
        heure: "13:00 - 15:00",
        lieu: "En distanciel",
        description: "La crise climatique est l'un des défis les plus urgents auxquels l’humanité fait face aujourd'hui.<br><br> C’est pourquoi nous vous invitons à rejoindre notre conférence en ligne dédiée aux solutions pour faire face à l’urgence climatique. Des experts en climatologie, des militants écologiques et des représentants d’ONG vous guideront à travers des débats enrichissants sur les actions à mener pour protéger notre planète. <br><br>Au programme : des présentations sur les énergies renouvelables, les initiatives pour réduire notre empreinte carbone, ainsi que des discussions sur les politiques climatiques mondiales. Les participants auront également l’opportunité de poser des questions et de partager leurs idées pour contribuer à la lutte contre le réchauffement climatique.<br><br>Un événement essentiel pour comprendre les enjeux et les solutions possibles pour un avenir durable.",
        image: "./image/imageSite/evenement/climat.jpg",
        suivi: "> Conférence Climat",
        prix: "gratuit",
    },
    {
        titre: "Rencontre Amnesty",
        organisateur: "Amnesty International",
        date: "Vendredi 25 mars 2025",
        heure: "16:00 - 18:00",
        lieu: "En distanciel",
        description: "Rejoignez-nous pour une rencontre en ligne avec Amnesty International, l’une des organisations les plus influentes dans la défense des droits humains à travers le monde. <br><br> Durant cette session, vous pourrez échanger avec des militants passionnés et engagés qui œuvrent pour la protection des droits fondamentaux des individus, quels que soient leur origine, leur croyance ou leur situation.<br><br>La rencontre sera l’occasion de discuter des campagnes en cours, des enjeux liés aux droits humains et des actions concrètes à mener pour faire avancer la cause. Vous apprendrez également comment vous pouvez vous engager et contribuer à la lutte pour les droits humains dans votre propre communauté.",
        image: "./image/imageSite/evenement/amnesty.png",
        suivi: "> Rencontre Amnesty",
        prix: "gratuit",
    },
    {
        titre: "Rencontre Unicef",
        organisateur: "Unicef",
        date: "Vendredi 15 mars 2025",
        heure: "20:00 - 22:00",
        lieu: "En distanciel",
        description: "Venez découvrir le travail exceptionnel de l'Unicef pour améliorer les conditions de vie des enfants à travers le monde. Lors de cette rencontre en ligne, vous aurez l’opportunité d’échanger avec des membres d’Unicef qui partageront leurs expériences et leurs projets pour venir en aide aux enfants dans le besoin.<br><br>L'événement couvrira des thématiques importantes telles que l'accès à l'éducation, la lutte contre la pauvreté et les programmes de santé destinés à sauver des vies. Vous pourrez aussi apprendre comment vous impliquer dans les projets d’Unicef et contribuer à faire une différence dans la vie de millions d'enfants.",
        image: "./image/imageSite/evenement/unicef.jpg",
        suivi: "> Rencontre Unicef",
        prix: "gratuit",
    }
];

const mainPage = document.getElementById("mainPage");
const detailPage = document.getElementById("detailPage");

function showDetails(index) {
    const event = events[index];
    document.getElementById("titre").textContent = event.titre;
    document.getElementById("organisateur").textContent = event.organisateur;
    document.getElementById("date").textContent = event.date;
    document.getElementById("heure").textContent = event.heure;
    document.getElementById("lieu").textContent = event.lieu;
    document.getElementById("description").innerHTML = event.description;
    document.getElementById("image").src = event.image;
    document.getElementById("suivi").textContent = event.suivi;
    document.getElementById("prix").textContent = event.prix;
    document.getElementById("img_maps").src = event.img_maps;

    mainPage.style.display = "none";
    detailPage.style.display = "block";
    window.scrollTo(0, 0);
}

function goBack() {
    mainPage.style.display = "block";
    detailPage.style.display = "none";
}
// on lis l'url pour afficher le bon evenement
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

document.addEventListener("DOMContentLoaded", () => {
    const eventIndex = getQueryParam("event");
    //si l'url contient event on affiche l'evenement correspondant
    if (eventIndex !== null && events[eventIndex]) {
        showDetails(eventIndex);
    }
});