<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomGeneratorRequestFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\CustomGeneratorRequest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Generator/GenerateGenerator/Request/CustomGeneratorRequest.php';
        $this->className = self::CLASS_NAME;
    }
}
