<?php

namespace OpenClassrooms\CodeGenerator\Repository;


use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;

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
     * @var \Symfony\Component\Filesystem\Filesystem
     */
    private $fileSystem;

    public function insert(FileObject $fileObject)
    {
        $fileObject->setAlreadyExists($this->fileSystem->exists($this->getFilePath($fileObject)));
        self::$fileObjects[$fileObject->getId()] = $this->getFilePath($fileObject);
    }

    private function getFilePath(FileObject $fileObject)
    {
        return $fileObject->getClassName().'.php';
    }

    public function flush()
    {
        foreach (self::$fileObjects as $fileObject) {
            if (!$fileObject->alreadyExists()) {
                $this->fileSystem->dumpFile($fileObject->getClassName().'php', $fileObject->getContent());
            }
        }
    }
}
