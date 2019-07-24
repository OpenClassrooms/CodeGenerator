<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class InMemoryFileObjectGateway implements FileObjectGateway
{
    /**
     * @var FileObject[]
     */
    public static $fileObjects = [];

    /**
     * @var FileObject[]
     */
    public static $flushedFileObjects = [];

    public function __construct()
    {
        self::$flushedFileObjects = [];
    }

    public function insert(FileObject $fileObject)
    {
        self::$fileObjects[$fileObject->getId()] = $fileObject;
    }

    public function findAll(): array
    {
        return self::$fileObjects;
    }

    public function flush(): void
    {
        self::$flushedFileObjects = self::$fileObjects;
        self::$fileObjects = [];
    }

    public function find(string $classname): ?FileObject
    {
        return self::$fileObjects[$classname] ?? null;
    }
}
