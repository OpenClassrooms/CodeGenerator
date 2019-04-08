<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\ViewModelsCommand;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelsCommandMock extends ViewModelsCommand
{
    const CONFIG_FILE = 'oc_code_generator_test.yml.dist';

    const ROOT_DIR = __DIR__ . '/../../';
}
