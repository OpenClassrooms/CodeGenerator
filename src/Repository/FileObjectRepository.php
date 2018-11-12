<?php

namespace OpenClassrooms\CodeGenerator\Repository;


use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectRepository implements FileObjectGateway
{
    /**
     * @var FileObject[]
     */
    private static $fileObjects = [];

    /**
     * @var Filesystem
     */
    private $fileSystem;

    public function insert(FileObject $fileObject): void
    {
        $fileObject->setAlreadyExists($this->fileSystem->exists($fileObject->getPath()));
        self::$fileObjects[$fileObject->getId()] = $fileObject->getPath();
    }


    public function flush(): void
    {
        foreach (self::$fileObjects as $fileObject) {
            if (!$fileObject->alreadyExists()) {
                $this->fileSystem->dumpFile($fileObject->getPath().'php', $fileObject->getContent());
            }
        }
    }

    public function setFileSystem(Filesystem $fileSystem): void
    {
        $this->fileSystem = $fileSystem;
    }
}
