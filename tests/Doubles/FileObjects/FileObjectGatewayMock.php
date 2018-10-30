<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;

/**
 * @author Samuel Gomis <samuel.gomis@openclassrooms.com>
 */
class FileObjectGatewayMock implements FileObjectGateway
{
    public function insert(FileObject $fileObject)
    {

    }

}
