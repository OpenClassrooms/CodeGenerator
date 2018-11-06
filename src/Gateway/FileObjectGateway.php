<?php

namespace OpenClassrooms\CodeGenerator\Gateway;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FileObjectGateway
{
    public function insert(FileObject $fileObject): FileObjectGateway;

    public function flush();

    public function setGeneratedFileDir(string $generatedFileDir);
}
