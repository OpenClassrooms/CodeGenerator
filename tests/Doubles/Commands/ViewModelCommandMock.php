<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\ViewModelCommand;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelCommandMock extends ViewModelCommand
{
    const ROOT_DIR = __DIR__ . '/../../..';

    protected function loadConfigParameters()
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(static::ROOT_DIR));
        $loader->load('oc_code_generator.yml.dist');
    }
}
