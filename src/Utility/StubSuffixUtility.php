<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use Carbon\Carbon;
use Faker\Provider\Base;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class StubSuffixUtility
{
    /**
     * @param FileObject[] $fileObjects
     */
    public static function incrementSuffix(FileObject $fileObject, array $fileObjects): FileObject
    {
        $pattern = '/\d+$/';
        $suffix = 1;
        while (isset($fileObjects[$fileObject->getId()]) && preg_match($pattern, $fileObject->getId())) {
            $suffix++;
            $fileObject->setClassName(preg_replace($pattern, $suffix, $fileObject->getId()));
        }

        return $fileObject;
    }
}
