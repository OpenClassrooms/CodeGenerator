<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomGeneratorRequestBuilderImplFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request\CustomGeneratorRequestBuilderImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Generator/GenerateGenerator/DTO/Request/CustomGeneratorRequestBuilderImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
