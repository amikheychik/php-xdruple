<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path;

final class DrupalPath
  implements Path {
  /** @var string */
  private $relative;

  public function __construct(string $relative) {
    $this->relative = $relative;
  }

  public function relative(): string {
    return $this->relative;
  }

  /**
   * @codeCoverageIgnore Drupal
   * @return string
   */
  public function absolute(): string {
    return drupal_realpath($this->relative);
  }
}
