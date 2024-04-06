<?php

namespace Drupal\custom\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormstateInterface;

/**
 * This example demonstrates a simple form with a singe text input element. We
 * extend FormBase which is the simplest form base class used in Drupal.
 */
Class SimpleForm extends FormBase {
  /**
  * Getter method for Form ID.
  *
  * @return string
  *   The unique ID of the form defined by this class.
  */
  public function getFormId() {
 	 return 'custom_simple_form';
  }

  /**
  * Build the simple form.
  *
  * @param array $form
  *   Default form array structure.
  * @param \Drupal\Core\Form\FormStateInterface $form_state
  *   Object containing current form state.
  *
  * @return array
  *   The render array defining the elements of the form.
  */
  public function buildform(array $form, FormstateInterface $form_state) {
  	$form['description'] = [
    '#type' => 'item',
    '#markup' => $this->t('This basic example shows a single text input element and a submit button'),
  	];

  	$form['title'] = [
    	'#type' => 'textfield',
    	'#title' => $this->t('Title'),
    	'#description' => $this->t('Title must be at least 5 characters in length.'),
    	'#required' => TRUE,
  		];

  	// Add element checkbox
  	$form['skip_validation'] = [
  		'#type' => 'checkbox',
  		'#title' => $this->t('Skip validatin'),
  		'#description' => $this->t('Allow users to enter less than 5 characters in title')
  	];

  	// Add select element
  	$form['direction'] = [
  		'#type' => 'select',
  		'#title' => $this->t('select a direction'),
  		'#options' => [
  			'right' => $this->t('Right'),
  			'left' => $this->t('Left'),
  	  ],
		];

  	// Group submit handlers in an actions element with a key of "actions" so
  	// that it gets styled correctly, and so that other modules may add actions
  	// to the form. This is not required, but is convention.
  	$form['actions'] = [
    	'#type' => 'actions',
  	];

  // Add a submit button that handles the submission of the form.
  	$form['actions']['submit'] = [
    	'#type' => 'submit',
    	'#value' => $this->t('Submit'),
  	];
		return $form;
	}

  /**
 	 * Implements form validation.
 	 *
 	 * @param array $form
   *   The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object describing the current state of the form.
  */
 	/*public function validateForm (array &$form, FormstateInterface $form_state) {
 		$title = $form_state->getValue('title');
 		// Get the value of the skip_validation checkbox. Defaults to 0 if
  	// unchecked. 1 if checked.
  	$skip_validation = $form_state->getValue('skip_validation');
 		if (!$skip_validation && strlen($title) < 5) {
 			$form_state->setErrorByName('title', $this->t('Title should be 5 characters long'));
 		}
 	}*/

 	public function submitForm (array &$form, FormstateInterface $form_state) {
 		$title = $form_state->getValue('title');
 		$this->messenger()->addStatus($this->t('You specified a title of %title.', ['%title' => $title]));
 	}

}