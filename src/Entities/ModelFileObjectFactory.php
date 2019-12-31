<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ModelFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject;
}
