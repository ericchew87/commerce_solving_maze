<?php

namespace Drupal\commerce_solving_maze\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure the solving maze settings for this site.
 */
class SolvingMazeAdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'commerce_solving_maze_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['commerce_solving_maze.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    $config = $this->config('commerce_solving_maze.settings');

    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API Key'),
      '#description' => $this->t('Enter your solvingmaze.com API key.'),
      '#default_value' => $config->get('api_key'),
      '#required' => TRUE,
    ];

    $form['warehouse_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Warehouse ID'),
      '#description' => $this->t('Enter your solvingmaze.com warehouse id.'),
      '#default_value' => $config->get('warehouse_id'),
      '#required' => TRUE,
    ];


    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $config = $this->config('commerce_solving_maze.settings');

    $config->set('api_key', $values['api_key']);
    $config->set('warehouse_id', $values['warehouse_id']);
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
