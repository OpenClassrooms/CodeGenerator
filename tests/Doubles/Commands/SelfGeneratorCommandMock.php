<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\SelfGeneratorCommand;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorCommandMock extends SelfGeneratorCommand
{
    const CONFIG_FILE_GENERATOR = self::ROOT_DIR_GENERATOR . 'oc_code_generator_self_test.yml.dist';

    const ROOT_DIR_GENERATOR = __DIR__ . '/../../';
}
