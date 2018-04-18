<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

use Xtuple\Util\Exception\ChainException;
use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Xdruple\Application\Configuration\ConfigurationXMLElement;
use Xtuple\Xdruple\Application\Configuration\Environment\Databases\Databases;
use Xtuple\Xdruple\Application\Configuration\Environment\Type\EnvironmentType;

final class EnvironmentXMLElement
  extends AbstractEnvironment {
  /**
   * @throws \Throwable
   *
   * @param XMLElement $environment
   * @param Databases  $databases
   */
  public function __construct(XMLElement $environment, Databases $databases) {
    try {
      parent::__construct(new EnvironmentStruct(
        new EnvironmentType($environment->attributes()->get('type')->value()),
        $databases,
        ($configuration = $environment->children('/environment/configuration')->get(0))
          ? (new ConfigurationXMLElement($configuration))->value()
          : []
      ));
    }
    catch (\Throwable $e) {
      throw new ChainException($e, 'Failed to parse environment XML information');
    }
  }
}
