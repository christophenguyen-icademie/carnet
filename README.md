# carnet d'adresse
Création d'un carnet d'adresse dans le cadre de l'évaluation TED Archiweb 2019 - Développement d’un Framework avec PHP (Symfony)

Installation du site web :

Depuis le code source : 
    
Pré-requis : 
      
    Composer >= 1.8.4
    Moteur PHP >= 7.3.3
    Symfony CLI >= 4.5.2
    !!L’extension « pdo_sqlite » activée dans le fichier PHP.ini
    !!L’extension « fileinfo » activée dans le fichier PHP.ini
    Le dossier d’exécution de PHP étant préalablement configuré dans la variable d’environnement PATH…

    
 1 - Téléchargez les sources dans le dossier de votre choix
 2 - Rendez-vous à la racine du projet et exécutez "composer install" afin de récupérer l'ensemble des dépendances
 3 - Exécutez le serveur en validant la commande "symfony server:start"
 4 - Relevez l'url d'accès au site, par défaut et si le port est disponible : "http://localhost:8000"
      
      
      
 
 
 A NOTER : 
 
 La base de données peut être réinitialisée de la manière suivante : 
 
    1 - Supprimer le fichier PROJET/var/data.db
    2 - Rendez-vous à la racine du projet et exécutez :
        php bin/console doctrine:database:create
        php bin/console doctrine:schema:update --force --complete
    3 - Un échantillon de contacts est automatiquement généré lors du premier lancement du site (ce qui explique le temps de      chargement plus long de la page)
      
