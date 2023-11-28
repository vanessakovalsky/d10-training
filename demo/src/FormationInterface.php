<?php

namespace Drupal\demo;
/**
 * This is the plugin interface, to define all plugins methods.
 */
interface FormationInterface {
    /**
     * Renvoie le nom de l’offre de formation.
     * @return string
     */
    public function getName();
    /**
     * Un slogan pour l’offre de formation  *
     * @return string
     */
    public function slogan();
}