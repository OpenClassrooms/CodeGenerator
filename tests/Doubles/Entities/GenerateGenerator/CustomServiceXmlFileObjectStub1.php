<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomServiceXmlFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Resources\config\Generator\GenerateGenerator\custom_generator.xml';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Resources/config/Generator/GenerateGenerator/AssemblerPattern/custom_generator.xml';
        $this->className = self::CLASS_NAME;
    }
}
