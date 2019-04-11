<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\GenerateGeneratorCommand;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorCommandMock extends GenerateGeneratorCommand
{
    const CONFIG_FILE_GENERATOR = self::ROOT_DIR_GENERATOR . 'oc_code_generator_generate_generator_test.yml.dist';

    const ROOT_DIR_GENERATOR = __DIR__ . '/../../';
}
