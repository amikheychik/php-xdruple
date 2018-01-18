<?php declare(strict_types=1);

/**
 * @file keeps View module data hooks implementations
 * @see  https://api.drupal.org/api/views/views.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\Views\Data\ViewsDataComponent;

include_once 'views_api.inc';

/**
 * Implements hook_views_data().
 *
 * @return array
 */
function xdruple_views_data() {
  return _xdruple_application_views_data_component()->viewsData();
}

/**
 * Implements hook_views_data_alter().
 *
 * @param array $data
 */
function xdruple_views_data_alter(&$data) {
  _xdruple_application_views_data_component()->viewsDataAlter($data);
}

function _xdruple_application_views_data_component(): ViewsDataComponent {
  /** @var ViewsDataComponent $component */
  $component = xdruple_application()->component(ViewsDataComponent::NAME);
  return $component;
}
