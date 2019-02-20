<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface FileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject;
}
