<?php

namespace Drupal\fst_newsletter\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* Creates a Simple form.
*/
class SimpleForm extends FormBase {

  /**
  * {@inheritdoc}
  */
  public function getFormId() {
    return 'fst_newsletter_simple_form';
  }

  /**
  * {@inheritdoc}
  */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = [];

    $form['container'] = [
      '#type' => 'details',
      '#title' => $this->t('Contact'),
    ];

    $form['container']['title'] = [
      '#title' => $this->t('Title'),
      '#type' => 'textfield',
      '#required' => TRUE,
      '#maxlenght' => 255,
      '#default_value' => $this->t('This is a default value'),
      '#attributes' => [
        'class' => ['custom-title'],
        'id' => 'title-id',
        'placeholder' => $this->t('Enter the title'),
      ],
    ];

    $form['container']['subject'] = [
      '#title' => $this->t('Subject'),
      '#type' => 'textfield',
    ];

    $form['container']['from'] = [
      '#title' => $this->t('From'),
      '#type' => 'email',
    ];

    $form['container']['body'] = [
      '#title' => $this->t('Body'),
      '#type' => 'textarea',
    ];

    $form['reason'] = [
      '#title' => $this->t('Reasons'),
      '#type' => 'radios',
      '#options' => [
        'General Enquiry',
        'New Project',
        'Hiring'
      ]
    ];

    $form['person'] = [
      '#title' => $this->t('Person'),
      '#type' => 'entity_autocomplete',
      '#target_type' => 'user',
    ];

    $form['term'] = [
      '#title' => $this->t('Term'),
      '#type' => 'entity_autocomplete',
      '#target_type' => 'taxonomy_term',
      '#selection_settings' => [
        'target_bundles' => ['category'],
      ],
    ];

    $form['content'] = [
      '#title' => $this->t('Content'),
      '#type' => 'entity_autocomplete',
      '#target_type' => 'node',
      '#selection_settings' => [
        'target_bundles' => ['resources'],
      ],
    ];

    $form['concent'] = [
      '#title' => $this->t('Do you agree for our Terms & Conditions?'),
      '#type' => 'checkbox',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit the form'),
    ];

    return $form;
  }

  /**
  * {@inheritdoc}
  */
   public function submitForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValues();
    \Drupal::messenger()->addStatus($value['title']);
    //dump($value);
   }
}
