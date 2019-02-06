<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Scripts;

use Composer\Script\Event;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ComposerScript
{
    const CODE_GENERATOR = 'openclassrooms/code-generator';

    public static function moveGeneratorParameters(Event $event)
    {
        if (self::CODE_GENERATOR !== $event->getComposer()->getPackage()->getName()) {
            rename('oc_code_generator.yml', '../../oc_code_generator.yml');
        }
    }
}
