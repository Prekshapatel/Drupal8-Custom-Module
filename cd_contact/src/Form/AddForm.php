<?php

/**
 * @file
 * Contains \Drupal\cd_contact\Form\AddForm.
 */

namespace Drupal\cd_contact\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DefaultForm.
 *
 * @package Drupal\cd_contact\Form
 */
class AddForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cd_contact_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
    );

    $form['message'] = array(
      '#type' => 'textarea',
      '#title' => t('Message'),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );

    return $form;
  }
 
  // Form Validation.
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (empty($form_state->getValue('name'))) {
      $form_state->setErrorByName('name', $this->t('Please enter your name.'));
    }
    if (empty($form_state->getValue('message'))) {
      $form_state->setErrorByName('message', $this->t('Please enter your message.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $message = $form_state->getValue('message');
    $result = db_insert('cd_contact')->fields(array('name' => $name, 'message' => $message))->execute();
    if ($result) {
      drupal_set_message('Contact form is successfully submitted.');
      //CdContactStorage::add(check_plain($name), check_plain($message));
      $form_state->setRedirect('<front>');
    } else {
      drupal_set_message('Error encountered.');
    }
  }

}
