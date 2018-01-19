<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component;

use stdClass;
use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\WebformComponentInfo;

interface WebformComponent {
  public function name(): string;

  public function info(): WebformComponentInfo;

  public function defaults(): array;

  public function edit(array $component): array;

  /**
   * @param array              $component
   * @param array|null         $value
   * @param bool               $filter
   * @param stdClass|bool|null $submission - TODO: check, if true value is possible
   *
   * @return array
   */
  public function render(array $component, ?array $value = null, bool $filter = true, $submission = null): array;

  public function display(array $component, array $value, string $format = 'html', ?stdClass $submission = null): array;

  public function actionSet(array $component, array &$element, array &$formState, string $value);

  public function submit(array $component, array $value): array;

  public function delete(array $component, array $value);

  public function help(string $section): string;

  public function theme(): array;

  public function analysis(array $component, array $sids = [], bool $single = false, \SelectQuery $join = null): array;

  public function table(array $component, array $value): string;

  public function attachments(array $component, array $value): array;

  public function csvHeaders(array $component, array $exportOptions): array;

  public function csvData(array $component, array $exportOptions, array $value): array;

  public function viewField(array $component, array $fields): array;
}
