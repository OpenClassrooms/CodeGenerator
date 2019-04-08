<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject;
}
