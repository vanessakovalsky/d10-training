## Exercice sur les plugins

## Objectifs

Cet exercice a pour objectifs :
* D'ajouter un plugin à un type de plugin existant
* De définir son propre type de plugin

## Ajouter un plugin

* Nous allons définir un nouveau champs pour notre vue sur les bateaux
* Les champs de Views utilise des plugin
* Il est donc nécessaire dans notre plugin de définir un nouveau plugin de type views_field
* Celui etends la classe FieldPluginBase
* A l'intérieur nous calculons et renvoyons l'aire d'un bateau en multipliant la largeur par la longueur


* Vous pouvez utiliser cet article pour vous aider avec la syntaxe : https://www.webomelette.com/creating-custom-views-field-drupal-8

## Définir son propre type de plugins

* Nous allons maintenant définir notre propre type de plugin, permettant à l'utilisateur de choisir et d'afficher un formulaire
* Pour cela vous pouvez suivre ce tutoriel : https://www.sitepoint.com/drupal-8-custom-plugin-types/ 
