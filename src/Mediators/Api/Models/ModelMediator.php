<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ModelMediator
{
    public function generateEntityModelTraitGenerator(string $className): FileObject;

    public function generatePatchEntityModelGenerator(string $className): FileObject;

    public function generatePostEntityModelGenerator(string $className): FileObject;
}
