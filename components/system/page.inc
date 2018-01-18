<?php declare(strict_types=1);

/**
 * @file keeps page delivery related hooks from system.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\System\Page\PageComponent;

/**
 * Implements hook_page_delivery_callback_alter().
 *
 * @param string $callback
 */
function xdruple_page_delivery_callback_alter(&$callback) {
  _xdruple_application_page_component()->pageDeliveryCallbackAlter($callback);
}

/**
 * Implements hook_html_head_alter().
 *
 * @param array $head_elements
 */
function xdruple_html_head_alter(&$head_elements) {
  _xdruple_application_page_component()->htmlHeadAlter($head_elements);
}

/**
 * Implements hook_css_alter().
 *
 * @param array $css
 */
function xdruple_css_alter(&$css) {
  _xdruple_application_page_component()->cssAlter($css);
}

/**
 * Implements hook_js_alter().
 *
 * @param array $javascript
 */
function xdruple_js_alter(&$javascript) {
  _xdruple_application_page_component()->jsAlter($javascript);
}

/**
 * Implements hook_page_build().
 *
 * @param array $page
 */
function xdruple_page_build(&$page) {
  _xdruple_application_page_component()->pageBuild($page);
}

/**
 * Implements hook_page_alter().
 *
 * @param array $page
 */
function xdruple_page_alter(&$page) {
  _xdruple_application_page_component()->pageAlter($page);
}

function _xdruple_application_page_component(): PageComponent {
  /** @var PageComponent $component */
  $component = xdruple_application()->component(PageComponent::NAME);
  return $component;
}
