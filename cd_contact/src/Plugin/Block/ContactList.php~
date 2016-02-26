<?php

namespace Drupal\cd_contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;



/**
 * Provides a 'Contact List' Block
 *
 * @Block(
 *   id = "contact_list",
 *   admin_label = @Translation("Contact List"),
 * )
 */
class ContactList extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $result = db_select('cd_contact', 'c')
      ->fields('c', array('cid', 'name', 'message'))
      ->range(0, 10)
      ->execute();

    $rows = array();

		foreach($result->fetchAll() as $key => $contact) {
      $row = array();
		  $row[] = $contact->name;
		  $row[] = $contact->message;
      $rows[] = $row;
		}

    $header = array('Name', 'Message');
    $output = array(
      'contacts' => array(
        '#theme' => 'table',
        '#header' => $header,
        '#rows' => $rows,
      ),
    );
    print render($output);
  }
}
