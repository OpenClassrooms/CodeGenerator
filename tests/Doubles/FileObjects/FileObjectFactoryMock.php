<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;

/**
 * @author Samuel Gomis <samuel.gomis@openclassrooms.com>
 */
class FileObjectFactoryMock implements FileObjectFactory
{
    public function create(string $type, string $className): FileObject
    {
        $fileObject = new FileObject();

        return $fileObject
            ->setClassName(__CLASS__)
            ->setContent('class content');

    }
}
