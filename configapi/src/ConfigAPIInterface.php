<?php

namespace Drupal\configapi;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

interface ConfigAPIInterface extends ConfigEntityInterface {

    public function getUrl();

    public function getApiKey();

}