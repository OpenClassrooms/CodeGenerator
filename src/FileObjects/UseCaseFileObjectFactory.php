<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject;
}
