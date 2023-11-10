<?php

namespace Drupal\boatmanagement\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ContactProprietaireForm.
 */
class ContactProprietaireForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'contact_proprietaire_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['sujet'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sujet'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['email_de_reponse'] = [
      '#type' => 'email',
      '#title' => $this->t('Email de reponse'),
      '#weight' => '0',
    ];
    $form['sujet_du_message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Sujet du message'),
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
