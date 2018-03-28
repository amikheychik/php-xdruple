<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Theme;

use Xtuple\Xdruple\Application\Service\Finder\Extension\AbstractExtension;
use Xtuple\Xdruple\Application\Service\Finder\Extension\ExtensionStruct;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Type;

abstract class AbstractTheme
  extends AbstractExtension {
  public function __construct(string $name) {
    parent::__construct(new ExtensionStruct(Type::THEME(), $name));
  }
}
