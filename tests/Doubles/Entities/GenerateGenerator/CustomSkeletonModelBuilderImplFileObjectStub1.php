<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CustomSkeletonModelBuilderImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl\CustomSkeletonModelBuilderImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/SkeletonModels/GenerateGenerator/Impl/CustomSkeletonModelBuilderImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
