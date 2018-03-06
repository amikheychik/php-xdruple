<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Details;

use Xtuple\Xdruple\Application\Component\Component\System\Theme\Element\LazyRenderView;
use Xtuple\Xdruple\Application\Service\Log\Record\Referrer\LogRecordReferrer;

interface LogRecordDetails
  extends \Serializable {
  public function __toString(): string;

  public function serialize();

  public function unserialize($serialized);

  public function render(): ?LazyRenderView;

  public function link(): ?LogRecordReferrer;
}
