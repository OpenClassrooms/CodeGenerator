<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Repository;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\StubGateway;
use OpenClassrooms\CodeGenerator\Utility\StubUtility;

class StubRepository implements StubGateway
{
    /**
     * @var FileObject[]
     */
    private static $fileObjects = [];

    public function clear()
    {
        self::$fileObjects = [];
    }

    public function insertAndIncrementSuffix(FileObject $fileObject)
    {
        StubUtility::incrementSuffix($fileObject, self::$fileObjects);
        self::$fileObjects[$fileObject->getId()] = $fileObject;
    }
}
