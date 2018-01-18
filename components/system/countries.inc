<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\Countries\CountriesComponent;

/**
 * Implements hook_countries_alter().
 *
 * @param $countries
 */
function xdruple_countries_alter(&$countries) {
  _xdruple_application_countries_component()->countriesAlter($countries);
}

function _xdruple_application_countries_component(): CountriesComponent {
  /** @var CountriesComponent $component */
  $component = xdruple_application()->component(CountriesComponent::NAME);
  return $component;
}
