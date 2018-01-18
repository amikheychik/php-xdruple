<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Module\MultipleFieldsRemoveButton\MultipleFieldsRemoveButtonComponent;

/**
 * @param array $widgets
 */
function xdruple_multiple_field_remove_button_field_widgets_alter(&$widgets) {
  _xdruple_application_multiple_field_remove_button_component()->multipleFieldRemoveButtonFieldWidgetsAlter($widgets);
}

function _xdruple_application_multiple_field_remove_button_component(): MultipleFieldsRemoveButtonComponent {
  /** @var MultipleFieldsRemoveButtonComponent $component */
  $component = xdruple_application()->component(MultipleFieldsRemoveButtonComponent::NAME);
  return $component;
}
