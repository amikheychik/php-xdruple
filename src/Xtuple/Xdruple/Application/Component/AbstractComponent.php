<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component;

use Xtuple\Util\Exception\ChainException;
use Xtuple\Util\Exception\Exception;
use Xtuple\Xdruple\Application\Component\Extension\Collection\Sequence\ArrayListComponentExtension;
use Xtuple\Xdruple\Application\Component\Extension\Collection\Sequence\ListComponentExtension;
use Xtuple\Xdruple\Application\Component\Extension\ComponentExtension;

abstract class AbstractComponent
  implements Component {
  /** @var string */
  private $name;
  /** @var string */
  private $type;
  /** @var array */
  private $dependencies;
  /** @var string|null */
  private $extension;
  /** @var string */
  private $module;

  public function __construct(string $name, string $type, array $dependencies = [], ?string $extension = null,
                              string $module = 'xdruple') {
    $this->name = $name;
    $this->type = $type;
    $this->dependencies = $dependencies;
    $this->extension = $extension;
    $this->module = $module;
  }

  public final function name(): string {
    return $this->name;
  }

  public final function module(): string {
    return $this->module;
  }

  public final function file(): string {
    return strtr('components/{type}/{name}.inc', [
      '{type}' => $this->type,
      '{name}' => $this->name,
    ]);
  }

  public final function dependencies(): array {
    return $this->dependencies;
  }

  /** @var ListComponentExtension|null */
  private $extensions;

  public final function extend(ComponentExtension $extension) {
    if (is_null($this->extensions())) {
      throw new Exception('Component {component} extensions are not supported', [
        'component' => $extension->component(),
      ]);
    }
    try {
      $this->extensions = $this->extensions()->append($extension);
    }
    catch (\Throwable $e) {
      throw new ChainException($e, 'Failed to extend component {component} with extension {type}. {required} required.', [
        'component' => $this->type,
        'type' => get_class($extension),
        'required' => $this->extension,
      ]);
    }
  }

  protected final function extensions(): ?ListComponentExtension {
    if ($this->extension && is_null($this->extensions)) {
      /** @noinspection PhpUnhandledExceptionInspection - no elements passed */
      $this->extensions = new ArrayListComponentExtension([], $this->extension);
    }
    return $this->extensions;
  }
}
