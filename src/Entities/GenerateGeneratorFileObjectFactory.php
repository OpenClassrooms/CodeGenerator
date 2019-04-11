<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenerateGeneratorFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject;
}
