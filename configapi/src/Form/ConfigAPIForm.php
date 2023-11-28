<?php

namespace Drupal\configapi\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form handler for the Example add and edit forms.
 */
class ConfigAPIForm extends EntityForm {

  /**
   * Constructs an ConfigAPIForm object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entityTypeManager.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $configapi = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $configapi->label(),
      '#description' => $this->t("Label for the Example."),
      '#required' => TRUE,
    ];
    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $configapi->id(),
      '#machine_name' => [
        'exists' => [$this, 'exist'],
      ],
      '#disabled' => !$configapi->isNew(),
    ];

    $form['url'] = [
        '#type' => 'textfield',
        '#title' => $this->t('URL'),
        '#maxlength' => 255,
        '#default_value' => $configapi->getUrl(),
        '#description' => $this->t("Url for the ConfigAPI."),
        '#required' => TRUE,
      ];
    
    $form['api_key'] = [
        '#type' => 'textfield',
        '#title' => $this->t('API Key'),
        '#maxlength' => 255,
        '#default_value' => $configapi->getApiKey(),
        '#description' => $this->t("Label for the ConfigAPI."),
        '#required' => FALSE,
      ];

    // You will need additional form elements for your custom properties.
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $configapi = $this->entity;

    $configapi->set('url', $form_state->getValue('url'));
    $configapi->set('api_key', $form_state->getValue('api_key'));

    $status = $configapi->save();

    if ($status === SAVED_NEW) {
      $this->messenger()->addMessage($this->t('The %label Config API created.', [
        '%label' => $configapi->label(),
      ]));
    }
    else {
      $this->messenger()->addMessage($this->t('The %label Config API updated.', [
        '%label' => $configapi->label(),
      ]));
    }

    $form_state->setRedirect('entity.configapi.collection');
  }

  /**
   * Helper function to check whether an ConfigAPI configuration entity exists.
   */
  public function exist($id) {
    $entity = $this->entityTypeManager->getStorage('configapi')->getQuery()
      ->condition('id', $id)
      ->execute();
    return (bool) $entity;
  }

}
