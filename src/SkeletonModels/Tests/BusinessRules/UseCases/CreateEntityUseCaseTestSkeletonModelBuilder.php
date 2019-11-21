<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseTestSkeletonModelBuilder
{
    public function create(): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateCreateEntityUseCaseTestFileObject(
        FileObject $createCreateEntityUseCaseTestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestFileObject(
        FileObject $createEntityRequestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestBuilderImplFileObject(
        FileObject $createEntityRequestBuilderImplFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestDTOFileObject(
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityDetailResponseAssemblerMockFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerMockFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityDetailResponseStubFileObject(
        FileObject $entityUseCaseDetailResponseStubFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityDetailResponseTestCaseFileObject(
        FileObject $entityUseCaseDetailResponseTestCaseFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityFactoryImplFileObject(
        FileObject $entityFactoryImplFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityStubFileObject(FileObject $entityStubFileObject): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function build(): CreateEntityUseCaseTestSkeletonModel;
}
