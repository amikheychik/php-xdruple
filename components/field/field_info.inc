<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Field\Info\FieldInfoComponent;

/**
 * Implements hook_field_info_max_weight().
 *
 * @param $entity_type
 * @param $bundle
 * @param $context
 *
 * @return int
 */
function xdruple_field_info_max_weight($entity_type, $bundle, $context) {
  return _xdruple_application_field_info_component()->fieldInfoMaxWeight($entity_type, $bundle, $context);
}

function _xdruple_application_field_info_component(): FieldInfoComponent {
  /** @var FieldInfoComponent $component */
  $component = xdruple_application()->component(FieldInfoComponent::NAME);
  return $component;
}
