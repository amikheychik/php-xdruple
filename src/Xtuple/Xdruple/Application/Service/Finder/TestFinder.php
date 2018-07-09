<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder;

use Xtuple\Util\File\Directory\Directory;
use Xtuple\Util\File\Directory\RelativeDirectory;
use Xtuple\Util\File\File\Collection\Set\Directory\RecursiveDirectorySetFile;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Path as ExtensionPath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Type;
use Xtuple\Xdruple\Application\Service\Finder\Path\Path;
use Xtuple\Xdruple\Application\Service\Finder\Path\PathStruct;

final class TestFinder
  implements Finder {
  /** @var Directory */
  private $drupal;

  public function __construct(Directory $drupal) {
    $this->drupal = $drupal;
  }

  public function extension(ExtensionPath $path): Path {
    $folders = [
      Type::ENGINE => ['themes/engines'],
      Type::MODULE => ['modules', 'sites/all/modules', 'sites/default/modules'],
      Type::LIBRARY => ['sites/all/libraries', 'sites/default/libraries'],
      Type::PROFILE => ['profiles'],
      Type::THEME => ['themes', 'sites/all/themes', 'sites/default/themes'],
    ];
    foreach (array_reverse($folders[$path->extension()->type()->value()]) as $folder) {
      try {
        $directory = new RelativeDirectory($this->drupal, $folder);
        $search = implode('/', array_filter([$folder, $path->extension()->name(), $path->relative()]));
        foreach (new RecursiveDirectorySetFile($directory) as $file) {
          if ($file->path()->absolute() === "{$this->drupal->path()->absolute()}/{$search}") {
            return new PathStruct($search, $file->path()->absolute());
          }
          if (dirname($file->path()->absolute()) === "{$this->drupal->path()->absolute()}/{$search}") {
            return new PathStruct($search, dirname($file->path()->absolute()));
          }
        }
      }
      catch (\Throwable $e) {
        unset($directory);
      }
    }
    return new PathStruct('', '');
  }
}
