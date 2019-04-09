<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorFileObjectsStub1
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
}
