<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomSkeletonModelImplFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl\CustomSkeletonModelImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/SkeletonModels/GenerateGenerator/Impl/CustomSkeletonModelImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
