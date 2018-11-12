<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class InMemoryFileObjectGateway implements FileObjectGateway
{
    /**
     * @var FileObject[]
     */
    public static $fileObjects = [];

    public function insert(FileObject $fileObject)
    {
        self::$fileObjects[$fileObject->getId()] = $fileObject->getPath();
    }
}
