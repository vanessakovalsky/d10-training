<?php

namespace Drupal\boatmanagement\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ContactProprietaireBlock' block.
 *
 * @Block(
 *  id = "contact_proprietaire_block",
 *  admin_label = @Translation("Contact proprietaire block"),
 * )
 */
class ContactProprietaireBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    return \Drupal::formBuilder()->getForm('Drupal\boatmanagement\Form\ContactProprietaireForm');
  }

}
