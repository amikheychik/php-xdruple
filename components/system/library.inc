<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\Library\LibraryComponent;

/**
 * Implements hook_library().
 *
 * @return array
 */
function xdruple_library() {
  return _xdruple_application_library_component()->library();
}

/**
 * Implements hook_library_alter().
 *
 * @param array  $libraries
 * @param string $module
 */
function xdruple_library_alter(&$libraries, $module) {
  _xdruple_application_library_component()->libraryAlter($libraries, $module);
}

function _xdruple_application_library_component(): LibraryComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(LibraryComponent::NAME);
  /** @var LibraryComponent $component */
  return $component;
}
