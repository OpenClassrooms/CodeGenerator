<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;

class InMemoryFileObjectGateway implements FileObjectGateway
{
    /**
     * @var FileObject[]
     */
    public static array $fileObjects = [];

    /**
     * @var FileObject[]
     */
    public static array $flushedFileObjects = [];

    public function __construct()
    {
        self::$flushedFileObjects = [];
    }

    public function find(string $classname): ?FileObject
    {
        return self::$fileObjects[$classname] ?? null;
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

    public function insert(FileObject $fileObject)
    {
        self::$fileObjects[$fileObject->getId()] = $fileObject;
    }
}
