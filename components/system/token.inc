<?php declare(strict_types=1);

/**
 * @file keeps Token API hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!system!system.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Token\TokenComponent;

/**
 * Implements hook_token_info().
 *
 * @return array
 */
function xdruple_token_info() {
  return _xdruple_application_token_component()->tokenInfo();
}

/**
 * Implements hook_token_info_alter().
 *
 * @param array $data
 */
function xdruple_token_info_alter(&$data) {
  _xdruple_application_token_component()->tokenInfoAlter($data);
}

/**
 * Implements hook_tokens().
 *
 * @param string   $type
 * @param string[] $tokens
 * @param array    $data
 * @param array    $options
 *
 * @return array
 */
function xdruple_tokens($type, $tokens, array $data = [], array $options = []) {
  return _xdruple_application_token_component()->tokens($type, $tokens, $data, $options);
}

/**
 * Implements hook_tokens_alter().
 *
 * @param array $replacements
 * @param array $context
 */
function xdruple_tokens_alter(array &$replacements, array $context) {
  _xdruple_application_token_component()->tokensAlter($replacements, $context);
}

function _xdruple_application_token_component(): TokenComponent {
  /** @var TokenComponent $component */
  $component = xdruple_application()->component(TokenComponent::NAME);
  return $component;
}
