<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class StubSuffixUtility
{
    private const STUB_PATTERN = '/\d+$/';

    /**
     * @param FileObject[] $fileObjects
     */
    public static function incrementClassNameSuffix(FileObject $fileObject, array $fileObjects): FileObject
    {
        $suffix = 1;
        while (isset($fileObjects[$fileObject->getId()]) && preg_match(self::STUB_PATTERN, $fileObject->getId())) {
            $suffix++;
            $fileObject->setClassName(preg_replace(self::STUB_PATTERN, $suffix, $fileObject->getId()));
        }

        return $fileObject;
    }

    public static function getStubIndex(FileObject $fileObject): string
    {
        preg_match('/(?<stub>Stub(\d+))/', $fileObject->getShortName(), $matches);

        return $matches['stub'];
    }
}
