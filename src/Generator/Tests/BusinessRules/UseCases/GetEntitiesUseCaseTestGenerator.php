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
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    const SUFFIX = '2';

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
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $entityGatewayFileObject = $this->createEntityGatewayFileObject($entityFileObject);
        $entityStubFileObjects[] = $this->createEntityStubFileObject($entityFileObject);
        $entityStubFileObjects[] = $this->createEntityStubFileObject($entityFileObject);
        $getEntitiesUseCaseFileObject = $this->createGetEntitiesUseCaseFileObject($entityFileObject);
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject($entityFileObject);
        $getEntitiesUseCaseRequestBuilderImplFileObject = $this->createGetEntitiesUseCaseRequestBuilderImplFileObject(
            $entityFileObject
        );
        $getEntitiesUseCaseRequestDTOFileObject = $this->createGetEntitiesUseCaseRequestDTOFileObject(
            $entityFileObject
        );
        $getEntitiesUseCaseTestFileObject = $this->createGetEntitiesUseCaseTestFileObject($entityFileObject);
        $inMemoryEntityGatewayFileObject = $this->createInMemoryEntityGatewayFileObject($entityFileObject);
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject($entityFileObject);
        $useCaseListItemResponseAssemblerFileObject = $this->createUseCaseListItemResponseAssemblerFileObject(
            $entityFileObject
        );
        $useCaseListItemResponseAssemblerMockFileObject = $this->createUseCaseListItemResponseAssemblerMockFileObject(
            $entityFileObject
        );
        $useCaseListItemResponseStubFileObjects[] = $this->createUseCaseListItemResponseStubFileObject(
            $entityFileObject
        );
        $useCaseListItemResponseStubFileObjects[] = $this->createUseCaseListItemResponseStubFileObject(
            $entityFileObject
        );
        $useCaseListItemResponseTestCaseFileObject = $this->createUseCaseListItemResponseTestCaseFileObject(
            $entityFileObject
        );

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

    private function createEntityFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createEntityGatewayFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createEntityStubFileObject(FileObject $entityFileObject): FileObject
    {
        $fileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );

        $this->stubGateway->insert($fileObject);

        return $fileObject;
    }

    private function createGetEntitiesUseCaseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntitiesUseCaseRequestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntitiesUseCaseRequestBuilderImplFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntitiesUseCaseRequestDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntitiesUseCaseTestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_TEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createInMemoryEntityGatewayFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseAssemblerMockFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseStubFileObject(FileObject $entityFileObject): FileObject
    {
        $fileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );

        $this->stubGateway->insert($fileObject);

        return $fileObject;
    }

    private function createUseCaseListItemResponseTestCaseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(array $fileObjects): GetEntitiesUseCaseTestSkeletonModel
    {
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

    public function setStubGateway(StubGateway $stubGateway): void
    {
        $this->stubGateway = $stubGateway;
    }
}
