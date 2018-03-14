<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

final class CSSStruct
  implements CSS {
  /** @var string|array|null */
  private $data;
  /** @var array|null */
  private $options;

  /**
   * @param string|null|array $data
   * @param array|null        $options
   */
  public function __construct($data = null, ?array $options = null) {
    $this->data = $data;
    $this->options = $options;
  }

  public function data() {
    return $this->data;
  }

  public function options(): ?array {
    return $this->options;
  }
}
