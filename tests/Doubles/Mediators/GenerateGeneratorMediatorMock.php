<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator\Impl\GenerateGeneratorMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomFileObjectStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomGeneratorFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomGeneratorRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomGeneratorRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomGeneratorRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomGeneratorRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomGeneratorTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomSkeletonModelAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomSkeletonModelAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomSkeletonModelBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomSkeletonModelBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomSkeletonModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomSkeletonModelImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\CustomTemplateFileObjectStub1;

class GenerateGeneratorMediatorMock extends GenerateGeneratorMediatorImpl
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
