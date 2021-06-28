<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Composer;

use Composer\Script\Event;
use Incenteev\ParameterHandler\Processor;

class ParameterHandler
{
    public const CODE_GENERATOR             = 'openclassrooms/code-generator';

    public const OC_CODE_GENERATOR_YML      = 'oc_code_generator.yml';

    public const OC_CODE_GENERATOR_YML_DIST = 'vendor/openclassrooms/code-generator/oc_code_generator.yml.dist';

    protected static ?Processor $processor;

    public static function createGeneratorFileParameters(Event $event): void
    {
        static::initProcessor($event);
        if (self::CODE_GENERATOR !== $event->getComposer()->getPackage()->getName()) {
            static::buildParameters();
        }
    }

    private static function initProcessor(Event $event): void
    {
        static::$processor ??= new Processor($event->getIO());
    }

    private static function buildParameters(): void
    {
        static::$processor->processFile(
            [
                'file'      => self::OC_CODE_GENERATOR_YML,
                'dist-file' => self::OC_CODE_GENERATOR_YML_DIST,
            ]
        );
    }
}
