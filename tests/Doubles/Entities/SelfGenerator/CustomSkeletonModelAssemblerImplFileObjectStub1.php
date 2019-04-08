<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class CustomSkeletonModelAssemblerImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\SkeletonModels\Impl\SelfGenerator\CustomSkeletonModelAssemblerImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/SkeletonModels/SelfGenerator/Impl/CustomSkeletonModelAssemblerImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
