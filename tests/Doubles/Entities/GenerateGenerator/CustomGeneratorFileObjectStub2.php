<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomGeneratorFileObjectStub2 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\CustomGenerator';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Generator/GenerateGenerator/BuilderPattern/CustomGenerator.php';
        $this->className = self::CLASS_NAME;
    }
}
