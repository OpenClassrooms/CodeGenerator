<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\Presentation\ViewModelsCommand;

class ViewModelsCommandMock extends ViewModelsCommand
{
    public const CONFIG_FILE = self::ROOT_DIR . 'oc_code_generator_test.yml.dist';

    public const ROOT_DIR    = __DIR__ . '/../../';
}
