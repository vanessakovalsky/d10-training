# Exercice - Responsive design

Cet exercice a pour objectifs :
* De déclarer des breakpoints
* De vérifier et ajuster l'affichage de son site en responsive

# Déclarer les breakpoints du site

* Créer un thème custom basé sur le thème par défaut
* Les breakpoints sont déclarés dans le fichier montheme.breakpoints.yml
* Par exemple : 
```yml
montheme.mobile:
  label: mobile
  mediaQuery: ''
  weight: 0
  multipliers:
    - 1x
montheme.narrow:
  label: narrow
  mediaQuery: 'all and (min-width: 560px) and (max-width: 850px)'
  weight: 1
  multipliers:
    - 1x
montheme.wide:
  label: wide
  mediaQuery: 'all and (min-width: 851px)'
  weight: 2
  multipliers:
    - 1x
```

## Tester son site sur différents formats
* Il existe de nombreuses solutions pour tester son site sur différents formats. En voici quelques unes :
* http://quirktools.com/screenfly 
* http://mattkersley.com/responsive/ 
* http://www.responsinator.com/ 

## Utiliser les système de grilles

* Afin d'optmiser l'affichage sur sont site sur différents formats, il est conseillé d'utilisé un système de grilles responsives qui vont s'adapter à la taille de l'écran.
* Voici quelques exemples de systèmes de grille responsive : 
* * Bootstrap -  http://getbootstrap.com
* * Zurb CSS : https://get.foundation/ 
* * Tailwind CSS : https://tailwindcss.com/ 
* * Bulma : https://bulma.io/ 

## Images responsive 

* Drupal embarque le module Responsive image style qui suit déjà les principe de design responsive. Pour l'utiliser pensez à utiliser le format responsive plutôt que image style lorsque vous gérer l'affichage d'un type de contenu.
* Définir des styles d'images responsive pour chaque breakpoint que vous avez défini


## Diaporama responsive

* Des solutions custom ou des modules permettent de gérer des diaporamas en responsive :
* * Example of a "lightweight" slideshow - http://yiibu.com/articles/rethinking-the-mobile-web/page-3.html#slideshow
* * Flexslider module - http://drupal.org/project/flexslider (based on http://flex.madebymufffin.com)
* * Full-screen image slideshow - http://buildinternet.com/project/supersized

## Menu responsive 
* Les menus standards de Drupal permettent déjà de s'afficher en responsive nativement.
* Certains modules permettent d'aller plus loin : 
* * Menu Block https://www.drupal.org/project/menu_block 
* * Better Jump Menus https://www.drupal.org/project/jump_menu 
* * Superfish : https://www.drupal.org/project/superfish 

-> Félicitations vous avez toutes les cartes en main pour adapter l'affichage de votre site au mobile.

