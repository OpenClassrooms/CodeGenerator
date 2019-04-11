<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomSkeletonModelAssemblerImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl\CustomSkeletonModelAssemblerImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/SkeletonModels/GenerateGenerator/Impl/CustomSkeletonModelAssemblerImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
