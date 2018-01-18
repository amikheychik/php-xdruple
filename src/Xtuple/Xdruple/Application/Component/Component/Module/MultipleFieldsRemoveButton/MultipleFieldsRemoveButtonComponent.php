<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\MultipleFieldsRemoveButton;

use Xtuple\Xdruple\Application\Component\Component;

interface MultipleFieldsRemoveButtonComponent
  extends Component {
  public const NAME = 'multiple_fields_remove_button';

  public function multipleFieldRemoveButtonFieldWidgetsAlter(array &$widgets);
}
