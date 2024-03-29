<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomFileObjectStubFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomFileObjectStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Tests/Doubles/Entities/GenerateGenerator/CustomFileObjectStub1.php';
        $this->className = self::CLASS_NAME;
    }
}
