<?php declare(strict_types=1);

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
        self::$fileObjects[$fileObject->getId()] = $fileObject;
    }

    public function flush(): void
    {
        foreach (self::$fileObjects as $key => $fileObject) {
            $fileObject->setAlreadyExists(file_exists($fileObject->getPath()));
            if (!$fileObject->alreadyExists()) {
                $this->fileSystem->dumpFile($fileObject->getPath(), $fileObject->getContent());
                $fileObject->write();
                unset(self::$fileObjects[$key]);
            }
        }
    }

    public function setFileSystem(Filesystem $fileSystem): void
    {
        $this->fileSystem = $fileSystem;
    }
}
