PrestaTechnicalTest
===================

Merci pour votre candidature chez Prestaconcept.

Toute l'équipe sera ravie de vous rencontrer si vous le réussissez.


## Le principe

Ce test permet d'évaluer le niveau technique des candidats lors de nos recrutements.

L'objectif consiste à installer une application permettant d'importer un fichier via une commande puis
d'afficher les données dans une page HTML.

Ce test se passe dans un temps défini à l'avance, nous vous demandons de faire un code clair et efficace.

**Nous préférons une liste de fonctionnalitées réduites mais codées proprement plutôt que des choses imprécises.**


## Les étapes du test (Symfony2)

- Installation de Symfony 2 (version stable) et suppression du bundle AcmeDemo
- Création d'un bundle **PrestaTechnicalTestBundle**
- Création du modèle : entitées Doctrine2 stockées dans une base MySql (se baser sur le contenu du fichier à importer)
- Création d'une commande d'import de fichier, suivant votre niveau :
    - /data/import/developers_simple.csv
    - /data/import/developers_middle.csv
    - /data/import/developers_big.csv
- Création d'une page HTML affichant la liste des développeurs en lazy loading :

    - la liste doit comporter les données suivantes :
        - Nom en majuscule
        - Prénom : première lettre en Majuscule suivie de minuscule
        - Le nombre de badges

    - en haut de la liste : afficher le nombre total de développeurs présents en base
    - la page doit être aux couleurs de Prestaconcept (prendre quelques couleurs de notre site sans aller trop loin)
    - ajouter un select permettant de trier la liste

- Création d'une action d'export des données de la liste au format csv

## Variante

Afin d'ouvrir ce test à des profils qui ne sont pas encore spécialiste Symfony2, vous pouvez réaliser ce test en utilisation un
autre framework ou en PHP pure.

Dans tous les cas, suivez les étapes vous adaptant suivant votre choix (ex : au niveau du nom du bundle).

## Points à valider

Vous devez profiter de ce test pour nous montrer que vous savez :

- écrire un code clair, correctement structuré et commenté (PHPdoc, PSR2)
- maîtriser les fonctions de base de PHP
- utiliser Symfony2 correctement (ou autre framework ou PHP)
- faire attention aux performances de l'application
- maitriser HTML / CSS / JS / LESS
- utiliser GIT : commitez vos développements suivants les étapes du test, nous serons attentifs à l'historique des commits


## Livraisons de vos développements

Merci de nous envoyer une pull request avant la date limite.
Votre branche doit être formatée de la façon suivante : AAAAMMJJ_nom_prenom

Si vous réussissez à nous démontrer vos compétences et votre envie de rejoindre notre équipe à travers ce test, nous
serons ravis de vous recontacter pour convenir d'une date d'entretien.
