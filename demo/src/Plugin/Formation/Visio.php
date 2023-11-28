<?php

namespace Drupal\demo\Plugin\Formation;

use Drupal\demo\Plugin\FormationBase;

/**
 * 
 * @Formation(
 *  id = "visio",
 *  name = @Translation("Distanciel")
 * )
 */

class Visio extends FormationBase {
    public function slogan(){
        return 'Apprenez d\'où vous voulez!';
    }
}