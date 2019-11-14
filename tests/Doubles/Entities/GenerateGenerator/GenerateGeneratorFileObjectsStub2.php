<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorFileObjectsStub2
{
    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new CustomFileObjectStubFileObjectStub1(),
            new CustomGeneratorFileObjectStub2(),
            new CustomGeneratorRequestBuilderFileObjectStub1(),
            new CustomGeneratorRequestBuilderImplFileObjectStub1(),
            new CustomGeneratorRequestDTOFileObjectStub1(),
            new CustomGeneratorRequestFileObjectStub1(),
            new CustomGeneratorTestFileObjectStub2(),
            new CustomServiceXmlFileObjectStub2(),
            new CustomSkeletonModelBuilderFileObjectStub1(),
            new CustomSkeletonModelBuilderImplFileObjectStub1(),
            new CustomSkeletonModelBuilderMockFileObjectStub1(),
            new CustomSkeletonModelFileObjectStub1(),
            new CustomSkeletonModelImplFileObjectStub1(),
            new CustomTemplateFileObjectStub1(),
        ];
    }
}
