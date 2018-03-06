<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

abstract class AbstractArraySession
  implements Session {
  /** @var array */
  private $storage;

  public function __construct(array &$storage) {
    $this->storage = &$storage;
  }

  public final function has(string $property): bool {
    return (
      isset($this->storage[$property])
      || array_key_exists($property, $this->storage)
    );
  }

  public final function get(string $property, $default = null) {
    if ($this->has($property)) {
      return $this->storage[$property];
    }
    return $default;
  }

  public final function set(string $property, $value) {
    $previous = $this->get($property);
    $this->storage[$property] = $value;
    return $previous;
  }

  public final function remove(string $property) {
    $previous = $this->get($property);
    unset($this->storage[$property]);
    return $previous;
  }
}
