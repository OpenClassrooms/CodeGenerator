<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\EditEntityUseCaseCommand;

class EditEntityUseCaseCommandMock extends EditEntityUseCaseCommand
{
    const CONFIG_FILE = self::ROOT_DIR . 'oc_code_generator_test.yml.dist';

    const ROOT_DIR    = __DIR__ . '/../../';
}
