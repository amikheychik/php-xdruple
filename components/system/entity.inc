<?php declare(strict_types=1);

/**
 * @file keeps implementations for hook_entity_* from system.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\System\Entity\EntityComponent;

/**
 * Implements hook_entity_info().
 */
function xdruple_entity_info() {
  return _xdruple_application_entity_component()->entityInfo();
}

/**
 * Implements hook_entity_info_alter().
 *
 * @param $entity_info
 */
function xdruple_entity_info_alter(&$entity_info) {
  _xdruple_application_entity_component()->entityInfoAlter($entity_info);
}

function _xdruple_application_entity_component(): EntityComponent {
  /** @var EntityComponent $component */
  $component = xdruple_application()->component(EntityComponent::NAME);
  return $component;
}
