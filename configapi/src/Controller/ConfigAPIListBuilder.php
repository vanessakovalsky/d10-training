<?php

namespace Drupal\configapi\Controller;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of ConfigAPI.
 */
class ConfigAPIListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Config API Name');
    $header['id'] = $this->t('Machine name');
    $header['url'] = $this->t('URL');
    $header['api_key'] = $this->t('API Key');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['url'] = $entity->getUrl();
    $row['api_key'] = $entity->getApiKey();

    return $row + parent::buildRow($entity);
  }

}
