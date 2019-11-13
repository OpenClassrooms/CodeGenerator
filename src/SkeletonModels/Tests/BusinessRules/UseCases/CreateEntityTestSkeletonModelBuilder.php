<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityTestSkeletonModelBuilder
{
    public function create(): CreateEntityTestSkeletonModelBuilder;

    public function withCreateCreateEntityTestFileObject(
        FileObject $createCreateEntityTestFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withCreateEntityFileObject(
        FileObject $createEntityFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withCreateEntityRequestFileObject(
        FileObject $createEntityRequestFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withCreateEntityRequestBuilderImplFileObject(
        FileObject $createEntityRequestBuilderImplFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withCreateEntityRequestDTOFileObject(
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): CreateEntityTestSkeletonModelBuilder;

    public function withEntityDetailResponseFileObject(
        FileObject $entityDetailResponseFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withEntityDetailResponseAssemblerMockFileObject(
        FileObject $entityDetailResponseAssemblerMockFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withEntityDetailResponseStubFileObject(
        FileObject $entityDetailResponseStubFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withEntityDetailResponseTestCaseFileObject(
        FileObject $entityDetailResponseTestCaseFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withEntityFactoryImplFileObject(
        FileObject $entityFactoryImplFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function withEntityStubFileObject(FileObject $entityStubFileObject): CreateEntityTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): CreateEntityTestSkeletonModelBuilder;

    public function build(): CreateEntityTestSkeletonModel;
}
