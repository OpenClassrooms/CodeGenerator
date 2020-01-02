<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ControllerFileObjectFactory
{
    public function create(string $type, string $entity): FileObject;
}
