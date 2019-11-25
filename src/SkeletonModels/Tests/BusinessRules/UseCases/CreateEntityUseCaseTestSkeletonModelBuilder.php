<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseTestSkeletonModelBuilder
{
    public function build(): CreateEntityUseCaseTestSkeletonModel;

    public function create(): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateCreateEntityUseCaseTestFileObject(
        FileObject $createCreateEntityUseCaseTestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestBuilderImplFileObject(
        FileObject $createEntityUseCaseRequestBuilderImplFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestDTOFileObject(
        FileObject $createEntityUseCaseRequestDTOFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestFileObject(
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityDetailResponseAssemblerMockFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerMockFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
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

    public function withEntityFileObject(FileObject $entityFileObject): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder;
}
