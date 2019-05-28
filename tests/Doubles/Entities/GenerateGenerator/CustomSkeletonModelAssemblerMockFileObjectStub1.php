<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomSkeletonModelAssemblerMockFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\GenerateGenerator\CustomSkeletonModelAssemblerMock';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Tests/Doubles/SkeletonModels/GenerateGenerator/CustomSkeletonModelAssemblerMock.php';
        $this->className = self::CLASS_NAME;
    }
}
