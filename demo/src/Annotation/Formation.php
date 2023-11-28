<?php
/**
* @file
* Contains \Drupal\demo\Annotation\Offre 
*/
namespace Drupal\demo\Annotation; 


use Drupal\Component\Annotation\Plugin;

/**
* Définir une offre avec un objet annotation.
* Plugin Namespace: Plugin\demo\offre 
* @see \Drupal\demo\Plugin\FormationPluginManager 
* @see plugin_api
* @Annotation
*/

class Formation extends Plugin {
    /**
    * The plugin ID.
    * @var string
    */
    public $id;

   /**
    * Le nom de l’offre
    * @var \Drupal\Core\Annotation\Translation
    * @ingroup plugin_translatable
    */
    public $name;

}