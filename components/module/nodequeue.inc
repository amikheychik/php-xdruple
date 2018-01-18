<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Module\NodeQueue\NodeQueueComponent;

function _xdruple_application_nodequeue_component(): NodeQueueComponent {
  /** @var NodeQueueComponent $component */
  $component = xdruple_application()->component(NodeQueueComponent::NAME);
  return $component;
}
