<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Scripts;

use OpenClassrooms\CodeGenerator\Scripts\ParameterHandler;
use Symfony\Component\Filesystem\Filesystem;

class ParameterHandlerMock extends ParameterHandler
{
    const OC_CODE_GENERATOR_YML_DIST = 'oc_code_generator.yml.dist';

    /**
     * @var Filesystem
     */
    public static $processor;
}
