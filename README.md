<p align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Logo_Universit%C3%A9_Paris-Nanterre.svg" width="400"></p>


# Projet de Système d'Information

- Léa HABERT
- Driss NAIT BELKACEM
- Sefkan TAS


Ce projet est un projet Laravel, nous allons les étapes à suivre pour installer le projet.

## Prérequis
- PHP (version 7.3 minimum)
- Composer
- MariaDB
- Un serveur web local (WAMP pour notre cas)

## Installation

1. Récupérer le projet soit en le téléchargeant directement depuis Gitlab soit en tapant la commande suivante dans votre répertoire :  
``git clone https://gitlab.com/psi_l3/psi_l3.git``  

2. Une fois le projet télécharger, placez vous à la racine de ce dernier puis taper la commande :  
``composer install``  
Cela va installer toutes les dépendances du projet (peut prendre du temps en fonction de votre connexion internet)

3. Puis à la racine du projet, modifier le nom du fichier ".env.example" en ".env"
et y ajouter les paramètres pour la connexion à la base de données :
- DB_HOST
- DB_PORT
- DB_DATABSE
- DB_USERNAME
- DB_PASSWORD

4. Dans le terminal à la racine du projet tapez la commande : ``php artisan key:generate``

5. Vous devez ensuite crée une base de données vide et y importer le script sql ``psi_l3.sql``  qui se trouve à la racine du projet.  

    Il se peut que les contraintes liées aux clés étrangères ne se soit pas correctement importées. Si c'est le cas vous devrez supprimer votre base de données, taper la commande suivante dans MariaDB ``SET FOREIGN_KEY_CHECKS = 1
`` puis recommencer l'étape 5.

Vous pouvez finalement lancer le serveur web et accéder à notre projet.  

Pour se connecter il existe un utilisateur avec les identifiants suivant:  
Email : admin@parisnanterre.fr  
Password : admin

## Import des données
Concernant la partie de l'import des données, le fichier donnée doit contenir 8 colonnes :
- id_individu.
- arpeg(le numéro de l'annuaire).
- nom_individu.
- prenom_individu.
- mail_individu.
- tel_individu.
- type_individu.
- année.  

Un fichier Excel est disponible dans le répertoire psi_l3 (fichierImport.xlsx).
