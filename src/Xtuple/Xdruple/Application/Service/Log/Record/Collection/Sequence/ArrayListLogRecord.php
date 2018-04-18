<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\ArrayList\StrictType\AbstractStrictlyTypedArrayList;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;

final class ArrayListLogRecord
  extends AbstractStrictlyTypedArrayList
  implements ListLogRecord {
  /**
   * @throws \Throwable - if the elements are of the wrong type
   *
   * @param LogRecord[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(LogRecord::class, $elements);
  }

  public function append(LogRecord $record): ListLogRecord {
    $records = [];
    foreach ($this as $element) {
      $records[] = $element;
    }
    $records[] = $record;
    /** @noinspection PhpUnhandledExceptionInspection - verified LogRecord type */
    return new ArrayListLogRecord($records);
  }
}
