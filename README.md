# carnet d'adresse
Création d'un carnet d'adresse dans le cadre de l'évaluation TED Archiweb 2019 - Développement d’un Framework avec PHP (Symfony)

***Installation :***

  **Depuis le code source :**
    
    Pré-requis : 
      
    Composer >= 1.8.4
    Moteur PHP >= 7.3.3
    Symfony CLI >= 4.5.2
    !!L’extension « pdo_sqlite » activée dans le fichier PHP.ini
    !!L’extension « fileinfo » activée dans le fichier PHP.ini
    Le dossier d’exécution de PHP étant préalablement configuré dans la variable d’environnement PATH…

    
   - Téléchargez les sources dans le dossier de votre choix
   - Rendez-vous à la racine du projet et exécutez
     *composer install*
     afin de récupérer l'ensemble des dépendances
   - Exécutez le serveur en validant la commande 
     *symfony server:start*
   - Relevez l'url d'accès au site, par défaut et si le port est disponible : http://localhost:8000
  
  
  **Docker :**
  
    Pré-requis : 
    Docker (testé >= 19.03)
  
   - téléchargez l'image depuis le DockerHub : 
    *docker pull nguyenvanchristophe/carnet-adresse*
   
   - exécutez un container avec par exemple la commande suivante : 
    *docker run -d -p 8000:8000 nguyenvanchristophe/carnet-adresse*
    
   - le site est disponible à l'adresse : 
     *http://localhost:8000*
  
      
      
 
 
 ***A NOTER :*** 
 
 La base de données peut être réinitialisée de la manière suivante : 
 
  - Supprimer le fichier PROJET/var/data.db
  - Rendez-vous à la racine du projet et exécutez :
      - *php bin/console doctrine:database:create*
      - *php bin/console doctrine:schema:update --force --complete*
  - Un échantillon de contacts est automatiquement généré lors du premier lancement du site (ce qui explique le temps de      chargement plus long de la page)
      
