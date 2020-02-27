<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class StubSuffixUtility
{
    /**
     * @param FileObject[] $fileObjects
     */
    public static function incrementSuffix(FileObject $fileObject, array $fileObjects): FileObject
    {
        $pattern = '/\d+$/';
        preg_match($pattern, $fileObject->getId(), $match);
        $suffix = $match[0] ?? 1;
        $suffix = (int) $suffix;
        while (isset($fileObjects[$fileObject->getId()]) && preg_match($pattern, $fileObject->getId())) {
            $suffix++;
            $fileObject->setClassName(preg_replace($pattern, $suffix, $fileObject->getId()));
        }

        if (null !== $fileObject->getContent()) {
            $fileObject->setClassName(preg_replace('/Stub(\d+)(::|;)/', 'Stub' . $suffix . '$2', $fileObject->getId()));
            $fileObject->setContent(
                preg_replace('/Stub(\d+)(::|;)/', 'Stub' . $suffix . '$2', $fileObject->getContent())
            );
        }

        return $fileObject;
    }
}
