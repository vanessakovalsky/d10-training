## Remplacer un service existant

## Objectifs

Cet exercice a pour objectifs
* de crééer son propre service
* de susbtituer un service de drupal par un service personnalisé

## Création du service

* Dans votre module, déclarer un nouveau service :
    * Créer la classe du service qui permet d'envoyer des mails à un utilisateur séléctionné : ce service simplifiera l'envoi d'email, en ne demandant que l'email du destinataire, et le contenu (titre + message) du mail, le reste des informations sera définies par défaut dans un formulaire de configuration modifiable dans l'administration (vous pouvez vous aider de cette documentation : https://www.drupal.org/docs/drupal-apis/configuration-api/working-with-configuration-forms ).
    * Créer le fichier yml de déclaration du service 

* Ajouter au niveau de la fiche d'un utilisateur un formulaire qui permet d'envoyer un email à celui-ci en appelant votre service

## Remplacer un service exisant 

* Créer une classe qui permet de fournir un service basé sur HttpFull (https://phphttpclient.com/) qui vient en remplacement du HttpClient (basé sur Guzzle) qui est fourni par le coeur de Drupal


## Documentation

* https://www.drupal.org/docs/drupal-apis/services-and-dependency-injection/services-and-dependency-injection-in-drupal-8
* https://www.drupal.org/docs/drupal-apis/services-and-dependency-injection/structure-of-a-service-file 
