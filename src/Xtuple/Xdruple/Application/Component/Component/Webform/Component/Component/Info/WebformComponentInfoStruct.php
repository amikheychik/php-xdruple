<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info;

use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features\WebformComponentFeatures;

final class WebformComponentInfoStruct
  implements WebformComponentInfo {
  /** @var string */
  private $label;
  /** @var string */
  private $description;
  /** @var WebformComponentFeatures */
  private $features;
  /** @var string */
  private $conditionalType;

  public function __construct(string $label, string $description, WebformComponentFeatures $features,
                              string $conditionalType = 'string') {
    $this->label = $label;
    $this->description = $description;
    $this->features = $features;
    $this->conditionalType = $conditionalType;
  }

  public function label(): string {
    return $this->label;
  }

  public function description(): string {
    return $this->description;
  }

  public function features(): WebformComponentFeatures {
    return $this->features;
  }

  public function conditionalType(): string {
    return $this->conditionalType;
  }
}
