<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\File\FileComponent;

/**
 * Implements hook_file_copy().
 *
 * @param \stdClass $file
 * @param \stdClass $source
 */
function xdruple_file_copy($file, $source) {
  _xdruple_application_file_component()->fileCopy($file, $source);
}

/**
 * Implements hook_file_delete().
 *
 * @param \stdClass $file
 */
function xdruple_file_delete($file) {
  _xdruple_application_file_component()->fileDelete($file);
}

/**
 * Implements hook_file_download().
 *
 * @param \stdClass $uri
 *
 * @return int|array|null (-1 - If the user does not have permission to access the file)
 */
function xdruple_file_download($uri) {
  return _xdruple_application_file_component()->fileDownload($uri);
}

/**
 * Implements hook_file_insert().
 *
 * @param \stdClass $file
 */
function xdruple_file_insert($file) {
  _xdruple_application_file_component()->fileInsert($file);
}

/**
 * Implements hook_file_load().
 *
 * @param \stdClass[] $files
 */
function xdruple_file_load($files) {
  _xdruple_application_file_component()->fileLoad($files);
}

/**
 * Implements hook_file_mimetype_mapping_alter().
 *
 * @param array $mapping
 */
function xdruple_file_mimetype_mapping_alter(&$mapping) {
  _xdruple_application_file_component()->fileMimetypeMappingAlter($mapping);
}

/**
 * Implements hook_file_move().
 *
 * @param \stdClass $file
 * @param \stdClass $source
 */
function xdruple_file_move($file, $source) {
  _xdruple_application_file_component()->fileMove($file, $source);
}

/**
 * Implements hook_file_presave().
 *
 * @param \stdClass $file
 */
function xdruple_file_presave($file) {
  _xdruple_application_file_component()->filePresave($file);
}

/**
 * Implements hook_file_update().
 *
 * @param \stdClass $file
 */
function xdruple_file_update($file) {
  _xdruple_application_file_component()->fileUpdate($file);
}

/**
 * Implements hook_file_url_alter().
 *
 * @param string $uri
 */
function xdruple_file_url_alter(&$uri) {
  _xdruple_application_file_component()->fileUrlAlter($uri);
}

/**
 * Implements hook_file_validate().
 *
 * @param \stdClass $file
 *
 * @return string[]
 */
function xdruple_file_validate($file) {
  return _xdruple_application_file_component()->fileValidate($file);
}

function _xdruple_application_file_component(): FileComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(FileComponent::NAME);
  /** @var FileComponent $component */
  return $component;
}
