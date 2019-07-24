<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\StubGateway;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModelBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntitiesUseCaseTestSkeletonModelBuilder
     */
    private $getEntitiesUseCaseTestSkeletonModelBuilder;

    /**
     * @var StubGateway
     */
    private $stubGateway;

    /**
     * @param GetEntitiesUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesUseCaseTestFileObject = $this->buildGetEntitiesUseCaseTestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesUseCaseTestFileObject);
        $this->stubGateway->clear();

        return $getEntitiesUseCaseTestFileObject;
    }

    private function buildGetEntitiesUseCaseTestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityStubFileObjects[] = $this->createEntityStubFileObject();
        $entityStubFileObjects[] = $this->createEntityStubFileObject();
        $getEntitiesUseCaseFileObject = $this->createGetEntitiesUseCaseFileObject();
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject();
        $getEntitiesUseCaseRequestBuilderImplFileObject = $this->createGetEntitiesUseCaseRequestBuilderImplFileObject();
        $getEntitiesUseCaseRequestDTOFileObject = $this->createGetEntitiesUseCaseRequestDTOFileObject();
        $getEntitiesUseCaseTestFileObject = $this->createGetEntitiesUseCaseTestFileObject();
        $inMemoryEntityGatewayFileObject = $this->createInMemoryEntityGatewayFileObject();
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject();
        $useCaseListItemResponseAssemblerFileObject = $this->createUseCaseListItemResponseAssemblerFileObject();
        $useCaseListItemResponseAssemblerMockFileObject = $this->createUseCaseListItemResponseAssemblerMockFileObject();
        $useCaseListItemResponseStubFileObjects[] = $this->createUseCaseListItemResponseStubFileObject();
        $useCaseListItemResponseStubFileObjects[] = $this->createUseCaseListItemResponseStubFileObject();
        $useCaseListItemResponseTestCaseFileObject = $this->createUseCaseListItemResponseTestCaseFileObject();

        $getEntitiesUseCaseTestFileObject->setContent(
            $this->generateContent(
                [
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                              => $entityFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY                                      => $entityGatewayFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB                                         => $entityStubFileObjects,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE                              => $getEntitiesUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST               => $getEntitiesUseCaseRequestFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL  => $getEntitiesUseCaseRequestBuilderImplFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO           => $getEntitiesUseCaseRequestDTOFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_TEST                         => $getEntitiesUseCaseTestFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY                            => $inMemoryEntityGatewayFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE                => $useCaseListItemResponseFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER      => $useCaseListItemResponseAssemblerFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK => $useCaseListItemResponseAssemblerMockFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB           => $useCaseListItemResponseStubFileObjects,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE      => $useCaseListItemResponseTestCaseFileObject,
                ]
            )
        );

        return $getEntitiesUseCaseTestFileObject;
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityStubFileObject(): FileObject
    {
        $fileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $this->domain,
            $this->entity
        );

        $this->stubGateway->insertAndIncrementSuffix($fileObject);

        return $fileObject;

    }

    private function createGetEntitiesUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntitiesUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntitiesUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntitiesUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntitiesUseCaseTestFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_TEST,
            $this->domain,
            $this->entity
        );
    }

    private function createInMemoryEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseAssemblerMockFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseStubFileObject(): FileObject
    {
        $fileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $this->domain,
            $this->entity
        );

        $this->stubGateway->insertAndIncrementSuffix($fileObject);

        return $fileObject;
    }

    private function createUseCaseListItemResponseTestCaseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(
        array $fileObjects
    ): string {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(
        array $fileObjects
    ): GetEntitiesUseCaseTestSkeletonModel {
        return $this->getEntitiesUseCaseTestSkeletonModelBuilder
            ->create()
            ->withEntityClassNameFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->withEntityClassNameGatewayFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY])
            ->withEntityClassNameStubFileObjects($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB])
            ->withGetEntitiesUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE]
            )
            ->withGetEntitiesUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST]
            )
            ->withGetEntitiesUseCaseRequestBuilderImplFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL]
            )
            ->withGetEntitiesUseCaseRequestDTOFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO]
            )
            ->withGetEntitiesUseCaseTestFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_TEST]
            )
            ->withInMemoryEntityGatewayFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY]
            )
            ->withUseCaseListItemResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE]
            )
            ->withUseCaseListItemResponseAssemblerFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER]
            )
            ->withUseCaseListItemResponseAssemblerMockFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK]
            )
            ->withUseCaseListItemResponseStubFileObjects(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB]
            )
            ->withUseCaseListItemResponseTestCaseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE]
            )
            ->build();
    }

    public function setGetEntitiesUseCaseTestSkeletonModelBuilder(
        GetEntitiesUseCaseTestSkeletonModelBuilder $getEntitiesUseCaseTestSkeletonModelBuilder
    ): void {
        $this->getEntitiesUseCaseTestSkeletonModelBuilder = $getEntitiesUseCaseTestSkeletonModelBuilder;
    }

    public function setStubGateway(
        StubGateway $stubGateway
    ): void {
        $this->stubGateway = $stubGateway;
    }
}
