<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Currency\Precision;

final class CurrencyPrecisionStruct
  implements CurrencyPrecision {
  /** @var null|int */
  private $precision;

  public function __construct(?int $precision) {
    $this->precision = $precision;
  }

  public function precision(): ?int {
    return $this->precision;
  }
}
