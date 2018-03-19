<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Module\NodeQueue\NodeQueueComponent;

function _xdruple_application_nodequeue_component(): NodeQueueComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(NodeQueueComponent::NAME);
  /** @var NodeQueueComponent $component */
  return $component;
}
