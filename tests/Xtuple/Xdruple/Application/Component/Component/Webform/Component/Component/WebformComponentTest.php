<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component;

use PHPUnit\Framework\TestCase;
use stdClass;
use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features\WebformComponentFeaturesStruct;
use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\WebformComponentInfoStruct;

class WebformComponentTest
  extends TestCase {
  public function testAbstract() {
    $info = new WebformComponentInfoStruct('Test', 'Test component', new WebformComponentFeaturesStruct());
    $component = new TestWebformComponent('test', $info);
    self::assertEquals('test', $component->name());
    self::assertTrue($info === $component->info());
  }
}

final class TestWebformComponent
  extends AbstractWebformComponent {
  public function defaults(): array {
    return [];
  }

  public function edit(array $component): array {
    return [];
  }

  public function render(array $component, ?array $value = null, bool $filter = true, $submission = null): array {
    return [];
  }

  public function display(array $component, array $value, string $format = 'html',
                          ?stdClass $submission = null): array {
    return [];
  }

  public function actionSet(array $component, array &$element, array &$formState, string $value) {
  }

  public function submit(array $component, array $value): array {
    return [];
  }

  public function delete(array $component, array $value) {
  }

  public function help(string $section): string {
    return '';
  }

  public function theme(): array {
    return [];
  }

  public function analysis(array $component, array $sids = [], bool $single = false, \SelectQuery $join = null): array {
    return [];
  }

  public function table(array $component, array $value): string {
    return '';
  }

  public function attachments(array $component, array $value): array {
    return [];
  }

  public function csvHeaders(array $component, array $exportOptions): array {
    return [];
  }

  public function csvData(array $component, array $exportOptions, array $value): array {
    return [];
  }

  public function viewField(array $component, array $fields): array {
    return [];
  }
}
