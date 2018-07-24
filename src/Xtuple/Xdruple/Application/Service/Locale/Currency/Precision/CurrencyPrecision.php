<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Currency\Precision;

interface CurrencyPrecision {
  public function precision(): ?int;
}
