<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectFactory;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelFileObjectFactoryMock implements ViewModelFileObjectFactory
{
    public function create(string $type, string $domainClassName): FileObject
    {
        $fileObject = new FileObject();

        return $fileObject
            ->setClassName(__CLASS__)
            ->setContent('class content');

    }
}
