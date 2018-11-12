<?php

namespace OpenClassrooms\CodeGenerator\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FileObjectGateway
{
    public function insert(FileObject $fileObject);
}
