<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Scripts;

use Composer\Script\Event;
use Incenteev\ParameterHandler\Processor;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ParameterHandler
{
    const CODE_GENERATOR = 'openclassrooms/code-generator';

    const OC_CODE_GENERATOR_YML = 'oc_code_generator.yml';

    const OC_CODE_GENERATOR_YML_DIST = 'vendor/openclassrooms/code-generator/oc_code_generator.yml.dist';

    /**
     * @var Processor
     */
    protected static $processor;

    public static function createGeneratorFileParameters(Event $event)
    {
        static::initProcessor($event);
        if (!file_exists(self::OC_CODE_GENERATOR_YML)
            && self::CODE_GENERATOR !== $event->getComposer()->getPackage()->getName()) {

            static::buildParameters();
        }
    }

    private static function initProcessor(Event $event)
    {
        static::$processor = static::$processor ?? new Processor($event->getIO());
    }

    private static function buildParameters(): void
    {
        static::$processor->processFile([
            'file'      => self::OC_CODE_GENERATOR_YML,
            'dist-file' => self::OC_CODE_GENERATOR_YML_DIST,
        ]);
    }
}
