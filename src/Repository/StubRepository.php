<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Repository;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\StubGateway;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class StubRepository implements StubGateway
{
    /**
     * @var FileObject[]
     */
    private static $fileObjects = [];

    public function insert(FileObject $fileObject)
    {
        $this->incrementStubSuffix($fileObject);
        self::$fileObjects[$fileObject->getId()] = $fileObject;
    }

    private function incrementStubSuffix(FileObject $fileObject): void
    {
        $suffix = 1;
        foreach (self::$fileObjects as $object) {
            if (strpos($object->getId(), $fileObject->getId()) !== false) {
                $suffix++;
            }
        }
        $fileObject->setClassName($this->replaceSuffix($fileObject, $suffix));
    }

    private function replaceSuffix(FileObject $fileObject, int $suffix): string
    {
        return preg_replace('/\d+$/', $suffix, $fileObject->getId());
    }

    public function clear()
    {
        self::$fileObjects = [];
    }
}
