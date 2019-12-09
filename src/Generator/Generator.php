<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface Generator
{
    public function generate(GeneratorRequest $generatorRequest): FileObject;
}
