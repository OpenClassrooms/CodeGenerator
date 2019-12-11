<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntityUseCaseTestSkeletonModelBuilder
{
    public function build(FileObject $fileObject): GetEntityUseCaseTestSkeletonModel;

    public function create(): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withGetEntityUseCaseFileObject(
        FileObject $getEntityUseCaseFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withGetEntityUseCaseRequestBuilderImplFileObject(
        FileObject $getEntityUseCaseRequestBuilderImplFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withGetEntityUseCaseRequestDTOFileObject(
        FileObject $getEntityUseCaseRequestDTOFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withGetEntityUseCaseRequestFileObject(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withGetEntityUseCaseTestFileObject(
        FileObject $getEntityUseCaseTestFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseAssemblerMockFileObject(
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseStubFileObject(
        FileObject $useCaseDetailResponseStubFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseTestCaseFileObject(
        FileObject $useCaseDetailResponseTestCaseFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;
}
