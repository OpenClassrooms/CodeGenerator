<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntitiesUseCaseTestSkeletonModelBuilder
{
    public function build(): GetEntitiesUseCaseTestSkeletonModel;

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

    public function withGetEntitiesUseCaseRequestBuilderImplFileObject(
        FileObject $getEntitiesUseCaseRequestBuilderImplFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseRequestDTOFileObject(
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseRequestFileObject(
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withGetEntitiesUseCaseTestFileObject(
        FileObject $getEntitiesUseCaseTestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseAssemblerFileObject(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseAssemblerMockFileObject(
        FileObject $useCaseListItemResponseAssemblerMockFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseFileObject(
        FileObject $useCaseListItemResponseFileObject
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
}
