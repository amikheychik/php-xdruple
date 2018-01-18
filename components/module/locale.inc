<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Module\Locale\LocaleComponent;

/**
 * Implements hook_locale().
 *
 * @param string $op
 *
 * @return array
 */
function xdruple_locale($op = 'groups') {
  return _xdruple_application_locale_component()->locale($op);
}

/**
 * Implements hook_multilingual_settings_changed().
 */
function xdruple_multilingual_settings_changed() {
  _xdruple_application_locale_component()->multilingualSettingsChanged();
}

function _xdruple_application_locale_component(): LocaleComponent {
  /** @var LocaleComponent $component */
  $component = xdruple_application()->component(LocaleComponent::NAME);
  return $component;
}
