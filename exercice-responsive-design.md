# Exercice - Responsive design

Cet exercice a pour objectifs :
* De déclarer des breakpoints
* De vérifier et ajuster l'affichage de son site en responsive

# Déclarer les breakpoints du site
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
* * 1140 CSS Grid -  http://cssgrid.net
* * Bootstrap -  http://getbootstrap.com
* * Columnal -  http://www.columnal.com
* * Fluid Baseline Grid -  http://fluidbaselinegrid.com
* * Foundation -  http://foundation.zurb.com
* * Golden Grid System -  http://goldengridsystem.com
* * Gridset -  http://www.gridsetapp.com/
* * Skeleton -  http://www.getskeleton.com
* * Susy -  http://susy.oddbird.net
* * Singularity -  http://singularity.gs
* * Zen Grids -  http://zengrids.com
* * Yahoo Pure.CSS -  http://purecss.io/

## Images responsive 
* Drupal embarque le module Picture qui suit déjà les principe de design responsibe. Pour l'utiliser pensez à utiliser le format Picture plutôt que Image lorsque vous gérer l'affichage d'un type de contenu.
* D'autres modules existes pour vous aider à gérer les images en responsive : 
* * Adaptive Image http://drupal.org/project/adaptive_image
* * Adaptive Image Styles http://drupal.org/project/ais
* * Client-side adaptive image http://drupal.org/project/cs_adaptive_image
* * Responsive Images http://drupal.org/project/responsive_images (not maintained anymore)
* * Responsive images and styles http://drupal.org/project/resp_img (replaced by “Picture”)
* * Fluid HTML grid that can be used with responsive design techniques http://drupal.org/project/views_fluid_grid

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

