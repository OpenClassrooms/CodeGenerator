<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseTestSkeletonModelBuilder
{
    public function create(): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withEntityGatewayFileObject(FileObject $entityGatewayFileObject): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withEntityStub1FileObject(FileObject $entityStub1FileObject): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withEntityStub2FileObject(FileObject $entityStub2FileObject): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseFileObject(FileObject $getEntitiesUseCaseFileObject): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseRequestFileObject(
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseRequestBuilderImplFileObject(
        FileObject $getEntitiesUseCaseRequestBuilderImplFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseRequestDTOFileObject(
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseAssemblerFileObject(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseAssemblerMockFileObject(
        FileObject $useCaseListItemResponseAssemblerMockFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseStub1FileObject(
        FileObject $useCaseListItemResponseStub1FileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseStub2FileObject(
        FileObject $useCaseListItemResponseStub2FileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseTestCaseFileObject(
        FileObject $useCaseListItemResponseTestCaseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseTestFileObject(
        FileObject $getEntitiesUseCaseTestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function build(): GetEntitiesUseCaseTestSkeletonModel;
}
