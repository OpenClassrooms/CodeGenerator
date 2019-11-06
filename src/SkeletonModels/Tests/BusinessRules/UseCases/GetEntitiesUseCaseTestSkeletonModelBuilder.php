<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseTestSkeletonModelBuilder
{
    public function create(): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withEntityClassNameFileObject(
        FileObject $entityFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withEntityClassNameGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    /**
     * @param array FileObject[]
     */
    public function withEntityClassNameStubFileObjects(
        array $entityStubFileObjects
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseFileObject(
        FileObject $getEntitiesUseCaseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

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

    /**
     * @param array FileObject[]
     */
    public function withUseCaseListItemResponseStubFileObjects(
        array $useCaseListItemResponseStubFileObjects
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseTestCaseFileObject(
        FileObject $useCaseListItemResponseTestCaseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseTestFileObject(
        FileObject $getEntitiesUseCaseTestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function build(): GetEntitiesUseCaseTestSkeletonModel;
}
