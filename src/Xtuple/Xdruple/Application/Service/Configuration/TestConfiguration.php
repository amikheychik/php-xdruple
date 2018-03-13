<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration;

use Xtuple\Util\Collection\Tree\ArrayTree\ArrayTree;
use Xtuple\Util\Collection\Tree\Tree;

final class TestConfiguration
  implements Configuration {
  /** @var Tree */
  private $configuration;

  public function __construct(array $configuration) {
    $this->configuration = new ArrayTree($configuration);
  }

  public function get(string $name, $default = null) {
    return $this->configuration->get([$name]) ?: $default;
  }
}
