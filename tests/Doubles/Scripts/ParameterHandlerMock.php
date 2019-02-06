<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Scripts;

use Composer\Script\Event;
use OpenClassrooms\CodeGenerator\Scripts\ParameterHandler;
use org\bovigo\vfs\vfsStream;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ParameterHandlerMock extends ParameterHandler
{
    const OC_CODE_GENERATOR_YML_DIST = 'oc_code_generator.yml.dist';

    /**
     * @var Filesystem
     */
    public static $filesystem;
}
