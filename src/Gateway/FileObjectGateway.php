<?php

namespace Gateway;

use FileObjects\FileObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FileObjectGateway
{
    public function insert(FileObject $fileObject);
}
