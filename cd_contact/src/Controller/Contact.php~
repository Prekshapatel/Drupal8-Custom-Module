<?php

/**
 * @file
 * Contains \Drupal\cd_contact\Controller\ContactController.
 */

namespace Drupal\cd_contact\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;
class Contact extends ControllerBase{

  // This is just example to render block and routing api.
  public function getAll() {
    $block = \Drupal\block\Entity\Block::load('contactlist');
    $block_content = \Drupal::entityManager()
      ->getViewBuilder('block')
      ->view($block);
 
    return array('#markup' => drupal_render($block_content));
  }
}
