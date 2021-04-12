<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\GenerateGenerator\GenerateGeneratorCommand;

class GenerateGeneratorCommandMock extends GenerateGeneratorCommand
{
    public const CONFIG_FILE_GENERATOR = self::ROOT_DIR_GENERATOR . 'oc_code_generator_test.yml';

    public const ROOT_DIR_GENERATOR    = __DIR__ . '/../../';
}
