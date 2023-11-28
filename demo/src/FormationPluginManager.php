<?php 

namespace Drupal\demo;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

class FormationPluginManager extends DefaultPluginManager {

    public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
        parent::__construct('Plugin/Formation', $namespaces, $module_handler, 'Drupal\demo\FormationInterface', 'Drupal\demo\Annotation\Formation');
        $this->alterInfo('formation_offres_info');
        $this->setCacheBackend($cache_backend, 'formation_offres'); 
    }
}
