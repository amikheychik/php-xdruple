<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Path as ExtensionPath;
use Xtuple\Xdruple\Application\Service\Finder\Path\DrupalPath;
use Xtuple\Xdruple\Application\Service\Finder\Path\Path;
use Xtuple\Xdruple\Application\Service\Finder\Path\PathStruct;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalFinder
  implements Finder {
  public function extension(ExtensionPath $path): Path {
    if ($path->extension()->type()->value() === 'library') {
      return $this->library($path->extension()->name(), $path->relative());
    }
    if ($file = drupal_get_filename($path->extension()->type()->value(), $path->extension()->name())) {
      $file = dirname($file);
      if ($path->relative()) {
        $file = "{$file}/{$path->relative()}";
      }
      if (file_exists($file)) {
        return new DrupalPath($file);
      }
    }
    return new PathStruct('', '');
  }

  /** @var \stdClass[][] */
  private $libraries = [];

  private function library(string $name, ?string $filepath = null): ?Path {
    if ($filepath && !empty($this->libraries[$name][$filepath])) {
      return new DrupalPath($this->libraries[$name][$filepath]->uri);
    }
    $file = null;
    if ($filepath) {
      $parts = explode('/', $filepath);
      $file = array_pop($parts);
    }
    $listing = $this->listing(strtr('/^{file}$/', [
      '{file}' => str_replace(
        ['/', '.'],
        ['\/', '\.'],
        $file ?: $name
      ),
    ]), 'libraries');
    foreach ($listing as $file) {
      $pattern = strtr($filepath ? '/{library}\/{file}$/' : '/{library}$/', [
        '{library}' => $name,
        '{file}' => str_replace(['/', '.'], ['\/', '\.'], $filepath),
      ]);
      if (preg_match($pattern, $file->uri)) {
        if ($filepath) {
          $this->libraries[$name][$filepath] = $file;
        }
        return new DrupalPath($file->uri);
      }
    }
    return null;
  }

  private function listing($mask, $directory) {
    $search = [$directory];
    $profiles = [];
    $profile = drupal_get_profile();
    if (drupal_valid_test_ua()) {
      $testingProfile = variable_get('simpletest_parent_profile', false);
      if ($testingProfile
        && $testingProfile !== $profile) {
        $profiles[] = $testingProfile;
      }
    }
    $profiles[] = $profile;
    foreach ($profiles as $profile) {
      if (file_exists("profiles/$profile/$directory")) {
        $search[] = "profiles/$profile/$directory";
      }
    }
    $search[] = 'sites/all/' . $directory;
    $config = conf_path();
    if (file_exists("$config/$directory")) {
      $search[] = "$config/$directory";
    }
    $files = [];
    foreach ($search as $dir) {
      $filesToAdd = $this->scan($dir, $mask);
      foreach (array_intersect_key($filesToAdd, $files) as $file_key => $file) {
        if (file_exists($infoFile = dirname($file->uri) . '/' . $file->name . '.info')) {
          $info = drupal_parse_info_file($infoFile);
          if (isset($info['core'])
            && $info['core'] !== DRUPAL_CORE_COMPATIBILITY) {
            unset($filesToAdd[$file_key]);
          }
        }
      }
      /** @noinspection SlowArrayOperationsInLoopInspection */
      $files = array_merge($files, $filesToAdd);
    }
    return $files;
  }

  private function scan($dir, $mask) {
    $files = [];
    if (is_dir($dir) && $handle = opendir($dir)) {
      while (($filename = readdir($handle)) !== false) {
        if (!preg_match('/(\.\.?|CVS)$/', $filename) && $filename[0] !== '.') {
          $uri = file_stream_wrapper_uri_normalize("$dir/$filename");
          if (is_dir($uri)) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $files = array_merge($this->scan($uri, $mask), $files);
          }
          if (preg_match($mask, $filename)) {
            $file = new \stdClass();
            $file->uri = $uri;
            $file->filename = $filename;
            $file->name = pathinfo($filename, PATHINFO_FILENAME);
            $files[$file->uri] = $file;
          }
        }
      }
      closedir($handle);
    }
    return $files;
  }
}
