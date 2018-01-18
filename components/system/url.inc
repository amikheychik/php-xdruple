<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\URL\URLComponent;

/**
 * Implements hook_url_inbound_alter().
 *
 * @param string $path
 * @param string $original_path
 * @param string $path_language
 */
function xdruple_url_inbound_alter(&$path, $original_path, $path_language) {
  _xdruple_application_url_component()->urlInboundAlter($path, $original_path, $path_language);
}

/**
 * Implements hook_url_outbound_alter().
 *
 * @param string $path
 * @param array  $options
 * @param string $original_path
 */
function xdruple_url_outbound_alter(&$path, &$options, $original_path) {
  _xdruple_application_url_component()->urlOutboundAlter($path, $options, $original_path);
}

function _xdruple_application_url_component(): URLComponent {
  /** @var URLComponent $url */
  $url = xdruple_application()->component(URLComponent::NAME);
  return $url;
}
