<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModelBuilder;

class GetEntityUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseTestSkeletonModelBuilder
     */
    private $getEntityUseCaseTestSkeletonModelBuilder;

    private function buildGetEntityUseCaseTestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityStubFileObject = $this->createEntityStubFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObjectFileObject();
        $inMemoryEntityGatewayFileObject = $this->createInMemoryEntityUseCaseGatewayFileObject();
        $getEntityUseCaseFileObject = $this->createGetEntityUseCaseFileObject();
        $getEntityUseCaseRequestBuilderImplFileObject = $this->createGetEntityUseCaseRequestBuilderImplFileObject();
        $getEntityUseCaseRequestDTOFileObject = $this->createGetEntityUseCaseRequestDTOFileObject();
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject();
        $getEntityUseCaseTestFileObject = $this->createGetEntityUseCaseTestFileObject();
        $useCaseDetailResponseBuilderMockFileObject = $this->createUseCaseDetailResponseBuilderMockFileObject();
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject();
        $useCaseDetailResponseTestCaseFileObject = $this->createUseCaseDetailResponseTestCaseFileObject();

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

    private function createEntityNotFoundExceptionFileObjectFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityStubFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseTestFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_TEST,
            $this->domain,
            $this->entity
        );
    }

    private function createInMemoryEntityUseCaseGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(
        array $fileObjects
    ): GetEntityUseCaseTestSkeletonModel {
        return $this->getEntityUseCaseTestSkeletonModelBuilder
            ->create()
            ->withEntityClassNameStubFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB])
            ->withEntityClassNameNotFoundExceptionFileObject(
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

    private function createUseCaseDetailResponseBuilderMockFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseStubFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseTestCaseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param GetEntityUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseTestFileObject = $this->buildGetEntityUseCaseTestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityUseCaseTestFileObject);

        return $getEntityUseCaseTestFileObject;
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

    public function setGetEntityUseCaseTestSkeletonModelBuilder(
        GetEntityUseCaseTestSkeletonModelBuilder $getEntityUseCaseTestSkeletonModelBuilder
    ): void {
        $this->getEntityUseCaseTestSkeletonModelBuilder = $getEntityUseCaseTestSkeletonModelBuilder;
    }
}
