<?php

namespace OpenClassrooms\CodeGenerator\Gateway\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
Class FileObjectGatewayImpl implements FileObjectGateway
{
    /**
     * @var string
     */
    protected $generatedFileDir;

    /**
     * @var array
     */
    private $fileObjects = [];

    public function insert(FileObject $fileObject): FileObjectGateway
    {
        $this->fileObjects[] = $fileObject;

        return $this;
    }

    public function flush()
    {
        $filesystem = new Filesystem();
        foreach ($this->fileObjects as $fileObject) {
            try {
                $filesystem->dumpFile(
                    $this->generatedFileDir . $fileObject->getPath() .$fileObject->getShortClassName().'.php',
                    $fileObject->getContent()
                );
            } catch (IOExceptionInterface $exception) {
                echo "An error occurred while creating your file in " . $exception->getPath();
            }
        }
    }

    /**
     * @param string $generatedFileDir
     */
    public function setGeneratedFileDir(string $generatedFileDir)
    {
        $this->generatedFileDir = $generatedFileDir;
    }
}

