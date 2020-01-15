<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class CreateEntityUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseTestSkeletonModelBuilder
     */
    private $createEntityTestSkeletonModelBuilder;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    /**
     * @param CreateEntityUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityTestFileObject = $this->buildCreateEntityUseCaseTestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityTestFileObject);

        return $createEntityTestFileObject;
    }

    private function buildCreateEntityUseCaseTestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityTestFileObject = $this->createCreateEntityUseCaseTestFileObject();
        $createEntityFileObject = $this->createEntityFileObject();
        $createEntityUseCaseRequestFileObject = $this->createEntityUseCaseRequestFileObject();
        $createEntityUseCaseRequestBuilderImplFileObject = $this->createEntityUseCaseRequestBuilderImplFileObject();
        $createEntityUseCaseRequestDTOFileObject = $this->createEntityUseCaseRequestDTOFileObject();
        $entityFileObject = $this->entityFileObject();
        $entityUseCaseDetailResponseFileObject = $this->entityUseCaseDetailResponseFileObject();
        $entityUseCaseDetailResponseAssemblerMockFileObject = $this->entityUseCaseDetailResponseAssemblerMockFileObject(
        );
        $entityUseCaseDetailResponseStubFileObject = $this->entityUseCaseDetailResponseStubFileObject();
        $entityUseCaseDetailResponseTestCaseFileObject = $this->entityUseCaseDetailResponseTestCaseFileObject();
        $entityFactoryImplFileObject = $this->entityFactoryImplFileObject();
        $entityStubFileObject = $this->entityStubFileObject();
        $inMemoryEntityGatewayFileObject = $this->inMemoryEntityGatewayFileObject();

        $createEntityUseCaseRequestBuilderImplFileObject->setMethods(
            MethodUtility::buildWitherCalledMethods($entityClassName)
        );

        $createEntityTestFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_TEST                        => $createEntityTestFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE                             => $createEntityFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST              => $createEntityUseCaseRequestFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL => $createEntityUseCaseRequestBuilderImplFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO          => $createEntityUseCaseRequestDTOFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                              => $entityFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE                   => $entityUseCaseDetailResponseFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK    => $entityUseCaseDetailResponseAssemblerMockFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB              => $entityUseCaseDetailResponseStubFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE         => $entityUseCaseDetailResponseTestCaseFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY_IMPL                                 => $entityFactoryImplFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB                                         => $entityStubFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY                                      => $inMemoryEntityGatewayFileObject,
                ]
            )
        );

        return $createEntityTestFileObject;
    }

    private function createCreateEntityUseCaseTestFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_TEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject()
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseRequestFileObject()
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseRequestBuilderImplFileObject()
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseRequestDTOFileObject()
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function entityFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function entityUseCaseDetailResponseFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function entityUseCaseDetailResponseAssemblerMockFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK,
            $this->domain,
            $this->entity
        );
    }

    private function entityUseCaseDetailResponseStubFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $this->domain,
            $this->entity
        );
    }

    private function entityUseCaseDetailResponseTestCaseFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function entityFactoryImplFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function entityStubFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $this->domain,
            $this->entity
        );
    }

    private function inMemoryEntityGatewayFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(array $fileObjects): CreateEntityUseCaseTestSkeletonModel
    {
        return $this->createEntityTestSkeletonModelBuilder->create()
            ->withCreateCreateEntityUseCaseTestFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_TEST]
            )
            ->withCreateEntityUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE]
            )
            ->withCreateEntityUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST]
            )
            ->withCreateEntityUseCaseRequestBuilderImplFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL]
            )
            ->withCreateEntityUseCaseRequestDTOFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO]
            )
            ->withEntityFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->withEntityDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withEntityDetailResponseAssemblerMockFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK]
            )
            ->withEntityDetailResponseStubFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB]
            )
            ->withEntityDetailResponseTestCaseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE]
            )
            ->withEntityFactoryImplFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY_IMPL])
            ->withEntityStubFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB])
            ->withInMemoryEntityGatewayFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY])
            ->build();
    }

    public function setCreateEntityUseCaseTestSkeletonModelBuilder(
        CreateEntityUseCaseTestSkeletonModelBuilder $createEntityTestSkeletonModelBuilder
    ): void {
        $this->createEntityTestSkeletonModelBuilder = $createEntityTestSkeletonModelBuilder;
    }

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }
}
