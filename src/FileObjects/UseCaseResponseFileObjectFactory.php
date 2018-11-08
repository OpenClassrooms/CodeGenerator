<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseFileObjectFactory
{
    public function create(string $type, string $domainClassName): FileObject;
}
