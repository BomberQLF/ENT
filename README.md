
# ENT Universitaire

Bienvenue sur le projet **ENT Universitaire**, une plateforme conçue pour faciliter la gestion des informations académiques et améliorer l'expérience des étudiants.

## Développé par :
- **Développeurs** : Tom MURPHY, Nicolas MODLUCH
- **Designeuses** : Anastasia GAWRYLUK, Enola TOURNEROCHE

## Fonctionnalités

### Pour les utilisateurs
- **Connexion et Déconnexion** :
  - Utilisateur de test : `test@gmail.com`
  - Mot de passe : `test`
- **Emploi du Temps** : Consultez votre emploi du temps personnalisé en fonction de votre groupe de TP.
- **To-Do List** : Gérez vos tâches académiques personnelles.
- **Notes** : Accédez à vos résultats scolaires.
- **Absences et Retards** : Consultez et justifiez vos absences et retards directement depuis la plateforme.
- **Menus du CROUS** : Consultez les menus de **COPPERNIC** et **ESIEE**.
- **Événements** : Restez informé des événements liés au campus et à l’université.

### Pour les administrateurs
- **Connexion Administrateur** :
  - Identifiant : `admin`
  - Mot de passe : `admin123`
- **Gestion des utilisateurs** :
  - Ajouter, modifier ou supprimer les tâches, notes, absences et autres données associées aux utilisateurs.

### Accès au site
- Le site est accessible à l'adresse : http://ent.molduch.butmmi.o2switch.site


### Étapes d'installation

1. **Téléchargement** :
   - Téléchargez le fichier ZIP du projet depuis le dépôt.
   - Décompressez-le dans un répertoire de votre choix (par exemple : `C:/wamp64/www/ent-universitaire` sous Windows avec WAMP).

2. **Configuration de la base de données** :
   - Importez le fichier SQL fourni (`ent.sql`) dans votre base de données locale :
     1. Connectez-vous à votre outil de gestion de base de données (phpMyAdmin, Adminer, etc.).
     2. Créez une nouvelle base de données nommée `ent_universitaire`.
     3. Importez le fichier SQL dans cette base.

3. **Configuration des paramètres de connexion** :
   - Rendez-vous dans le fichier de configuration (par exemple `studentModel.php`) et configurez les paramètres de connexion à votre base de données :
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASSWORD', '(root si sur mamp)');
     define('DB_NAME', 'ent');
     ```

4. **Démarrage du serveur** :
   - Lancez votre serveur local (MAMP, WAMP ou autre).
   - Accédez au projet via votre navigateur en saisissant l'URL suivante :
     ```
     http://localhost/ent-universitaire
     ```
---

**Merci de respecter le travail fourni sur ce projet.** Pour toute question ou collaboration, n'hésitez pas à nous contacter.
