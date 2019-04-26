<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomSkeletonModelBuilderMockFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\GenerateGenerator\CustomSkeletonModelBuilderMock';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/tests/Doubles/SkeletonModels/GenerateGenerator/CustomSkeletonModelBuilderMock.php';
        $this->className = self::CLASS_NAME;
    }
}
