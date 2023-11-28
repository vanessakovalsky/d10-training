<?php

namespace Drupal\demo\Plugin;
use Drupal\Core\Plugin\PluginBase;
use Drupal\demo\FormationInterface;

abstract class FormationBase extends PluginBase implements FormationInterface {
    public function getName() {
        return $this->pluginDefinition['name'];
    }

    public function slogan() {
        return t('Best offre ever.');
    }
   }
   
