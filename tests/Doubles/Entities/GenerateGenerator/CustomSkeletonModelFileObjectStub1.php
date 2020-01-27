<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomSkeletonModelFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModel';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/SkeletonModels/GenerateGenerator/CustomSkeletonModel.php';
        $this->className = self::CLASS_NAME;
    }
}
