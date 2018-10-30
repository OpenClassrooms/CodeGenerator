<?php

namespace OpenClassrooms\CodeGenerator\Gateway;


use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FileObjectGateway
{
    public function insert(FileObject $fileObject);
}
