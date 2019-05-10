<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseTestSkeletonModelBuilder
     */
    private $getEntityUseCaseTestSkeletonModelBuilder;

    /**
     * @param GetEntityUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseTestFileObject = $this->buildGetEntityUseCaseTestFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($getEntityUseCaseTestFileObject);

        return $getEntityUseCaseTestFileObject;
    }

    private function buildGetEntityUseCaseTestFileObject(string $entityClassName): FileObject
    {
        $entityStubFileObject = $this->createEntityStubFileObject($entityClassName);
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObjectFileObject(
            $entityStubFileObject
        );
        $inMemoryEntityGatewayFileObject = $this->createInMemoryEntityUseCaseGatewayFileObject(
            $entityStubFileObject
        );
        $getEntityUseCaseFileObject = $this->createGetEntityUseCaseFileObject($entityStubFileObject);
        $getEntityUseCaseRequestBuilderImplFileObject = $this->createGetEntityUseCaseRequestBuilderImplFileObject(
            $entityStubFileObject
        );
        $getEntityUseCaseRequestDTOFileObject = $this->createGetEntityUseCaseRequestDTOFileObject(
            $entityStubFileObject
        );
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject($entityStubFileObject);
        $getEntityUseCaseTestFileObject = $this->createGetEntityUseCaseTestFileObject($entityStubFileObject);
        $useCaseDetailResponseBuilderMockFileObject = $this->createUseCaseDetailResponseBuilderMockFileObject(
            $entityStubFileObject
        );
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject($entityStubFileObject);
        $useCaseDetailResponseTestCaseFileObject = $this->createUseCaseDetailResponseTestCaseFileObject(
            $entityStubFileObject
        );

        $getEntityUseCaseTestFileObject->setContent(
            $this->generateContent(
                [
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB                                      => $entityStubFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                       => $entityNotFoundExceptionFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY                         => $inMemoryEntityGatewayFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE                             => $getEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL => $getEntityUseCaseRequestBuilderImplFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO          => $getEntityUseCaseRequestDTOFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST              => $getEntityUseCaseRequestFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_TEST                        => $getEntityUseCaseTestFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK => $useCaseDetailResponseBuilderMockFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB           => $useCaseDetailResponseStubFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE      => $useCaseDetailResponseTestCaseFileObject,
                ]
            )
        );

        return $getEntityUseCaseTestFileObject;
    }

    private function createEntityStubFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createEntityNotFoundExceptionFileObjectFileObject(
        FileObject $entityStubFileObject
    ): FileObject {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createInMemoryEntityUseCaseGatewayFileObject(
        FileObject $entityStubFileObject
    ): FileObject {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseFileObject(FileObject $entityStubFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestBuilderImplFileObject(
        FileObject $entityStubFileObject
    ): FileObject {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestDTOFileObject(FileObject $entityStubFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestFileObject(FileObject $entityStubFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseTestFileObject(FileObject $entityStubFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_TEST,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseBuilderMockFileObject(
        FileObject $entityStubFileObject
    ): FileObject {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseStubFileObject(FileObject $entityStubFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseTestCaseFileObject(
        FileObject $entityStubFileObject
    ): FileObject {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE,
            $entityStubFileObject->getDomain(),
            $entityStubFileObject->getEntity()
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
    private function createSkeletonModel(array $fileObjects): GetEntityUseCaseTestSkeletonModel
    {
        return $this->getEntityUseCaseTestSkeletonModelBuilder
            ->create()
            ->withEntityStubFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB])
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withInMemoryEntityGatewayFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY]
            )
            ->withGetEntityUseCaseFileObject($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE])
            ->withGetEntityUseCaseRequestBuilderImplFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL]
            )
            ->withGetEntityUseCaseRequestDTOFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO]
            )
            ->withGetEntityUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST]
            )
            ->withGetEntityUseCaseTestFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_TEST]
            )
            ->withUseCaseDetailResponseAssemblerMockFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK]
            )
            ->withUseCaseDetailResponseStubFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB]
            )
            ->withUseCaseDetailResponseTestCaseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE]
            )
            ->build($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB]);
    }

    public function setGetEntityUseCaseTestSkeletonModelBuilder(
        GetEntityUseCaseTestSkeletonModelBuilder $getEntityUseCaseTestSkeletonModelBuilder
    ): void {
        $this->getEntityUseCaseTestSkeletonModelBuilder = $getEntityUseCaseTestSkeletonModelBuilder;
    }
}
