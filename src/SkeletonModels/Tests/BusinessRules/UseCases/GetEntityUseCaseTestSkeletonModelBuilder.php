<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseTestSkeletonModelBuilder
{
    public function create(): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityClassNameStubFileObject(
        FileObject $entityStubFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityClassNameNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
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

    public function withUseCaseDetailResponseAssemblerMockFileObject(
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseStubFileObject(
        FileObject $useCaseDetailResponseStubFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseTestCaseFileObject(
        FileObject $useCaseDetailResponseTestCaseFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder;

    public function build(FileObject $fileObject): GetEntityUseCaseTestSkeletonModel;
}
