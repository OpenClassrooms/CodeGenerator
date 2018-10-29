<?php

namespace FileObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FileObjectFactory
{
    public function create(string $type, string $className): FileObject;
}
