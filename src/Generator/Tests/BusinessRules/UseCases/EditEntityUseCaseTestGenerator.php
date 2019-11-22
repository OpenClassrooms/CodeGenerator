<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\EditEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\EditEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\EditEntityUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class EditEntityUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EditEntityUseCaseTestSkeletonModelBuilder
     */
    private $editEntityUseCaseTestSkeletonModelBuilder;

    /**
     * @param EditEntityUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $editEntityUseCaseTestFileObject = $this->buildEditEntityUseCaseTestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($editEntityUseCaseTestFileObject);

        return $editEntityUseCaseTestFileObject;
    }

    public function setEditEntityUseCaseTestSkeletonModelBuilder(
        EditEntityUseCaseTestSkeletonModelBuilder $editEntityUseCaseTestSkeletonModelBuilder
    ): void {
        $this->editEntityUseCaseTestSkeletonModelBuilder = $editEntityUseCaseTestSkeletonModelBuilder;
    }

    private function buildEditEntityUseCaseTestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseTestFileObject = $this->createEditEntityUseCaseTestFileObject();
        $editEntityUseCaseFileObject = $this->createEditEntityUseCaseFileObject();
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();
        $editEntityUseCaseRequestBuilderImplFileObject = $this->createEditEntityUseCaseRequestBuilderImplFileObject();
        $editEntityUseCaseRequestDTOFileObject = $this->createEditEntityUseCaseRequestDTOFileObject();
        $entityFileObject = $this->createEntityFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityStubFileObject = $this->createEntityStubFileObject();
        $entityUseCaseDetailResponseAssemblerMockFileObject = $this->createEntityUseCaseDetailResponseAssemblerMockFileObject(
        );
        $entityUseCaseDetailResponseFileObject = $this->createEntityUseCaseDetailResponseFileObject();
        $entityUseCaseDetailResponseStubFileObject = $this->createEntityUseCaseDetailResponseStubFileObject();
        $entityUseCaseDetailResponseTestCaseFileObject = $this->createEntityUseCaseDetailResponseTestCaseFileObject();
        $inMemoryEntityUseCaseGatewayFileObject = $this->createInMemoryEntityUseCaseGatewayFileObject();

        $editEntityUseCaseRequestBuilderImplFileObject->setMethods(
            MethodUtility::buildWitherCalledMethods($entityClassName)
        );

        $editEntityUseCaseTestFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_TEST                        => $editEntityUseCaseTestFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE                             => $editEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST              => $editEntityUseCaseRequestFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL => $editEntityUseCaseRequestBuilderImplFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_DTO          => $editEntityUseCaseRequestDTOFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                            => $entityFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                        => $entityNotFoundExceptionFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB                                       => $entityStubFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK  => $entityUseCaseDetailResponseAssemblerMockFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE                 => $entityUseCaseDetailResponseFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB            => $entityUseCaseDetailResponseStubFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE       => $entityUseCaseDetailResponseTestCaseFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY                          => $inMemoryEntityUseCaseGatewayFileObject,
                ]
            )
        );

        return $editEntityUseCaseTestFileObject;
    }

    private function createEditEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseTestFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_TEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
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
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseAssemblerMockFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseStubFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseTestCaseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE,
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
     * @param FileObject[] $fileObjects
     */
    private function createSkeletonModel(array $fileObjects): EditEntityUseCaseTestSkeletonModel
    {
        return $this->editEntityUseCaseTestSkeletonModelBuilder
            ->create()
            ->withEditEntityUseCaseTestFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_TEST]
            )
            ->withEditEntityUseCaseFileObject($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE])
            ->withEditEntityUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST]
            )
            ->withEditEntityUseCaseRequestBuilderImplFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL]
            )
            ->withEditEntityUseCaseRequestDTOFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_DTO]
            )
            ->withEntityFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityStubFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB])
            ->withEntityUseCaseDetailResponseAssemblerMockFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK]
            )
            ->withEntityUseCaseDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withEntityUseCaseDetailResponseStubFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB]
            )
            ->withEntityUseCaseDetailResponseTestCaseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE]
            )
            ->withInMemoryEntityUseCaseGatewayFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY]
            )
            ->build();
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }
}
