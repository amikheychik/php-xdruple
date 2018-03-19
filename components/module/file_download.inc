<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Module\File\Download\FileDownloadComponent;

/**
 * Implements hook_file_download_access().
 *
 * @param array     $file_item
 * @param string    $entity_type
 * @param \stdClass $entity
 *
 * @return bool
 */
function xdruple_file_download_access($file_item, $entity_type, $entity) {
  return _xdruple_application_file_download_component()->fileDownloadAccess($file_item, $entity_type, $entity);
}

/**
 * Implements hook_file_download_access_alter().
 *
 * @param array     $grants
 * @param array     $file_item
 * @param string    $entity_type
 * @param \stdClass $entity
 */
function xdruple_file_download_access_alter(&$grants, $file_item, $entity_type, $entity) {
  _xdruple_application_file_download_component()->fileDownloadAccessAlter($grants, $file_item, $entity_type, $entity);
}

function _xdruple_application_file_download_component(): FileDownloadComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(FileDownloadComponent::NAME);
  /** @var FileDownloadComponent $component */
  return $component;
}
