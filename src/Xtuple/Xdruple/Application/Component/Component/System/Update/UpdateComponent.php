<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Update;

interface UpdateComponent {
  public const NAME = 'update';

  public function install(): void;

  /**
   * @see hook_update_N()
   */
  public function boot(): void;

  /**
   * @see hook_update_last_removed()
   *
   * @return int
   */
  public function updateLastRemoved(): int;

  /**
   * @see hook_update_dependencies()
   *
   * @return array
   */
  public function updateDependencies(): array;

  /**
   * @see hook_update_N()
   *
   * @throws \DrupalUpdateException
   *
   * @param int $version
   *
   * @return string
   */
  public function updateN(int $version): string;
}
