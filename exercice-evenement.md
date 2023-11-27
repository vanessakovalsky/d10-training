## Gérer les évènements de Drupal

## Objectifs

cet exercice a pour objectifs :

* de savoir écouter un évènement du coeur de dupal
* de créer et déclencher son propre évènement

## Déclencher une réaction sur un évènement du coeur

* Lors de l'envoi du formulaire qui permet d'utiliser notre service d'envoi de mail, nous voulons écouter l'évènement du coeur associé
* Dans le subscriber que vous allez créer en réaction à cet évènement, on enregistre un log du mail envoyé contenant qui a déclenché l'envoi d'email

## Créer un évènement et le déclencher

* Créer un évènement personnalisé
* Déclencher cet évènement à chaque fois que notre service est appelé
* Dans le subscriber, incrémenter un compteur du nombre de mail envoyé et stocker le dans la configuration de Drupal. 



## Documentation

* Documentation des évents du coeur : https://api.drupal.org/api/drupal/core%21core.api.php/group/events/10
* S'abonner et déclencher des évènements : https://www.drupal.org/docs/develop/creating-modules/subscribe-to-and-dispatch-events
* Créer et déclencher son propre évènement : https://drupalwebacademy.com/event-api 
