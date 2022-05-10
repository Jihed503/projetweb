# Mini-projet web Gestion d'absences
------

Il s’agit d’un site web de gestion des étudiants et leurs absences. Notre site web devra regrouper toutes les fonctionnalités nécessaires au gestion des étudiants telles que : afficher tous les étudiants, ajouter un étudiants, modifier un groupe, gérer les absences… et toutes les fonctionnalités techniques comme : s’inscrire, s’authentifier, se déconnecter… Mais aussi, il devra répondre à des exigences non fonctionnelles par sa qualités et ses performances.

### Tech Stack

* **HTML**, **CSS**, et **Javascript** Frontend
* **MySql** Base de donnée
* **php**  langage serveur
* **Ajax/jQuery** Frontend

### Fichiers: Structure de projet

```sh
├── afficher.php
├── AfficherEtudiants.php
├── afficherEtudiantsParClasse.php
├── afficherGroupe.php
├── afficherPar.php
├── ajouter.php
├── AjouterEtudiant.php
├── AjouterGroupe.php
├── ajoutG.php
├── assets
│   ├── brand
│   │   ├── bootstrap-outline.svg
│   │   ├── bootstrap-solid.svg
│   │   └── user-login.svg
│   ├── dist
│   │   ├── css
│   │   │   ├── bootstrap.min.css
│   │   │   ├── bootstrap.min.css.map
│   │   │   ├── ensinscrip.css
│   │   │   ├── jumbotron.css
│   │   │   ├── lateralbar.css
│   │   │   └── signin.css
│   │   └── js
│   │       ├── bootstrap.bundle.min.js
│   │       ├── bootstrap.bundle.min.js.map
│   │       ├── inscrire.js
│   │       ├── jquery.min.js
│   │       └── smooth_scroll.js
│   └── gdsc-enicarthage.jpg
├── chercher.php
├── ChercherEtudiants.php
├── connexion.php
├── deconnexion.php
├── etat.php
├── etatAbsence.php
├── gestion_etudiant.sql
├── index.php
├── inscription.php
├── login.php
├── modifier.php
├── ModifierEtudiants.php
├── ModifierG.php
├── ModifierGroupe.php
├── modifierListe.php
├── ModifierListeEtudiants.php
├── README.md
├── saisir.php
├── saisirAbsence.php
├── SupprimerET.php
├── SupprimerG.php
├── SupprimerGroupe.php
└── SupprimerListeEtudiants.php
```


Overall:
* Chaque page web est implémentée par deux fichiers séparé une pour la partie client (affichage) et une pour la traitement des données (serveur).
* Les modules  frontend sont localisés dans `assets/`.

Instructions
-----

1. Faire un clone de projet pour l'avoir localement.
2. Télecharger le fichier gestion_etudiant et l'importer dans votre base de donnée local.
3. Amusez-vous!
