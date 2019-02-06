<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Scripts;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ParameterHandler
{
    const CODE_GENERATOR = 'openclassrooms/code-generator';

    const OC_CODE_GENERATOR_YML = 'oc_code_generator.yml';

    const OC_CODE_GENERATOR_YML_DIST = 'vendor/openclassrooms/code-generator/oc_code_generator.yml.dist';

    /**
     * @var Filesystem
     */
    protected static $filesystem;

    public static function createGeneratorParameters(Event $event)
    {
        static::initFilesystem();
        if (self::CODE_GENERATOR !== $event->getComposer()->getPackage()->getName()) {
            $codeGeneratorConfig = Yaml::parseFile(
                static::OC_CODE_GENERATOR_YML_DIST
            );
            $codeGeneratorConfig['parameters']['base_namespace'] = 'OC\\';
            $codeGeneratorConfig['parameters']['stub_namespace'] = 'Doubles\OC\\';
            $codeGeneratorConfig['parameters']['tests_base_namespace'] = 'OC\\';
            $codeGeneratorConfig['parameters']['api_dir'] = 'ApiBundle\\';
            $codeGeneratorConfig['parameters']['app_dir'] = 'AppBundle\\';
            $codeGeneratorConfig['parameters']['author'] = '';
            $codeGeneratorConfig['parameters']['author_mail'] = '';

            $codeGeneratorYaml = Yaml::dump($codeGeneratorConfig);

            static::$filesystem->dumpFile(self::OC_CODE_GENERATOR_YML, $codeGeneratorYaml);
        }
    }

    private static function initFilesystem()
    {
        static::$filesystem = static::$filesystem ?? new Filesystem();
    }
}
