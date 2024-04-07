<?php

namespace Drupal\custom\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormstateInterface;

/**
 * Configuration form for salutaion message
 */
Class SalutationConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getEditableConfignames() {
    return ['custom.custom_salutation'];
  }

  public function getFormId() {
    return 'salutation_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('custom.custom_salutation');

    $form['salutation'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Salutation'),
      '#title_display' => 'before',
      '#description' => $this->t('Please provide the saluation you want to use'),
      '#required' => TRUE,
      '#default_value' => $config->get('salutation'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $salutation = $form_state->getValue('salutation');
    if (strlen($salutation) > 100) {
      $form_state->setErrorByName('salutation', $this->t('Salutation cannot be more than 20 letters'));
    }
  } 

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('custom.custom_salutation')
    ->set('salutation', $form_state->getValue('salutation'))
    ->save();
    return parent::submitForm($form, $form_state);
  }
}