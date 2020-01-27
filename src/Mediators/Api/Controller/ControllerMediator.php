<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ControllerMediator
{
    public function generateDeleteEntityControllerGenerator(string $className): FileObject;

    public function generateGetEntitiesControllerGenerator(string $className): FileObject;

    public function generateGetEntityControllerGenerator(string $className): FileObject;

    public function generatePatchEntityControllerGenerator(string $className): FileObject;

    public function generatePostEntityControllerGenerator(string $className): FileObject;
}
