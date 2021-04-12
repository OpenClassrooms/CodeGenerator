<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Scripts;

use OpenClassrooms\CodeGenerator\Composer\ParameterHandler;
use Symfony\Component\Filesystem\Filesystem;

class ParameterHandlerMock extends ParameterHandler
{
    public const OC_CODE_GENERATOR_YML_DIST = 'oc_code_generator.yml.dist';

    /**
     * @var Filesystem
     */
    public static ?\Incenteev\ParameterHandler\Processor $processor;
}
