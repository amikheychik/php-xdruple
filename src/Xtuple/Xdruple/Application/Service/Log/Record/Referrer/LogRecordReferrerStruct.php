<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Referrer;

final class LogRecordReferrerStruct
  implements LogRecordReferrer {
  /** @var string */
  private $title;
  /** @var string */
  private $path;
  /** @var array */
  private $options;

  public function __construct(string $title, string $path, array $options = []) {
    $this->title = $title;
    $this->path = $path;
    $this->options = $options;
  }

  public function title(): string {
    return $this->title;
  }

  public function path(): string {
    return $this->path;
  }

  public function options(): array {
    return $this->options;
  }
}
