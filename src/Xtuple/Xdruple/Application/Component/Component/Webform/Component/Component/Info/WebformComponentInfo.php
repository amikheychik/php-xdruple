<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info;

use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features\WebformComponentFeatures;

interface WebformComponentInfo {
  public function label(): string;

  public function description(): string;

  public function features(): WebformComponentFeatures;

  public function conditionalType(): string;
}
