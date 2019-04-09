<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomSkeletonModelImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\SkeletonModels\SelfGenerator\Impl\CustomSkeletonModelImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/SkeletonModels/SelfGenerator/Impl/CustomSkeletonModelImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
