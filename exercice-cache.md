# Gestion du cache

Cet exercice a pour objectif :
* de gérer le cache du bloc en fonction du contexte

## Gérer le cache du bloc d'aire

* Afin de réactiver le cache sur notre bloc de calcul d'air, nous allons définir un contexte de cache et utiliser les tags afin de demander à Drupal de mettre en cache le bloc en fonction du noeud, cela permettra de bénéficier de la mise en cache de Drupal tout en ayant bien la bonne valeur calculée pour chaque noeud.
* Remplacer la fonction getCacheMaxAge par le code suivant :
```
  public function getCacheTags() {
    //With this when your node change your block will rebuild
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      //if there is node add its cachetag
      return Cache::mergeTags(parent::getCacheTags(), array('node:' . $node->id()));
    } else {
      //Return default tags instead.
      return parent::getCacheTags();
    }
  }

  public function getCacheContexts() {
    //if you depends on \Drupal::routeMatch()
    //you must set context of this block with 'route' context tag.
    //Every new route this block will rebuild
    return Cache::mergeContexts(parent::getCacheContexts(), array('route'));
  }
```

* Vider le cache de Drupal, et tester sur différents noeuds, le calcul devrait rester bon sur chaque page. 
