<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\SelfGenerator\Impl\SelfGeneratorMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomFileObjectStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomGeneratorFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomGeneratorRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomGeneratorRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomGeneratorRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomGeneratorRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomGeneratorTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomSkeletonModelAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomSkeletonModelAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomSkeletonModelBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomSkeletonModelBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomSkeletonModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomSkeletonModelImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\CustomTemplateFileObjectStub1;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class SelfGeneratorMediatorMock extends SelfGeneratorMediatorImpl
{
    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new CustomFileObjectStubFileObjectStub1(),
            new CustomGeneratorFileObjectStub1(),
            new CustomGeneratorRequestBuilderFileObjectStub1(),
            new CustomGeneratorRequestBuilderImplFileObjectStub1(),
            new CustomGeneratorRequestDTOFileObjectStub1(),
            new CustomGeneratorRequestFileObjectStub1(),
            new CustomGeneratorTestFileObjectStub1(),
            new CustomSkeletonModelAssemblerFileObjectStub1(),
            new CustomSkeletonModelAssemblerImplFileObjectStub1(),
            new CustomSkeletonModelBuilderFileObjectStub1(),
            new CustomSkeletonModelBuilderImplFileObjectStub1(),
            new CustomSkeletonModelFileObjectStub1(),
            new CustomSkeletonModelImplFileObjectStub1(),
            new CustomTemplateFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
