<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityRequestBuilderImplSkeletonModelAssembler
     */
    private $createEntityRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param CreateEntityRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestBuilderImplFileObject = $this->buildCreateEntityRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestBuilderImplFileObject);

        return $createEntityRequestBuilderImplFileObject;
    }

    private function buildCreateEntityRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestBuilderFileObject = $this->createCreateEntityRequestBuilderFileObject();
        $createEntityRequestBuilderImplFileObject = $this->createCreateEntityRequestBuilderImplFileObject();
        $createEntityRequestDTOFileObject = $this->createCreateEntityRequestDTOFileObject();
        $createEntityRequestFileObject = $this->createCreateEntityRequestFileObject();

        $createEntityRequestBuilderImplFileObject->setMethods(
            MethodUtility::buildMethodsChained($entityClassName, $createEntityRequestBuilderFileObject->getShortName())
        );

        $createEntityRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $createEntityRequestBuilderFileObject,
                $createEntityRequestBuilderImplFileObject,
                $createEntityRequestDTOFileObject,
                $createEntityRequestFileObject
            )
        );

        return $createEntityRequestBuilderImplFileObject;
    }

    private function createCreateEntityRequestBuilderFileObject(): FileObject
    {
        return $this->createCreateEntityRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER
        );
    }

    private function createCreateEntityRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityRequestBuilderImplFileObject(): FileObject
    {
        return $this->createCreateEntityRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL
        );
    }

    private function createCreateEntityRequestDTOFileObject(): FileObject
    {
        return $this->createCreateEntityRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function createCreateEntityRequestFileObject(): FileObject
    {
        return $this->createCreateEntityRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST
        );
    }

    private function generateContent(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestBuilderImplFileObject,
        FileObject $createEntityRequestDTOFileObject,
        FileObject $createEntityRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $createEntityRequestBuilderFileObject,
            $createEntityRequestBuilderImplFileObject,
            $createEntityRequestDTOFileObject,
            $createEntityRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestBuilderImplFileObject,
        FileObject $createEntityRequestDTOFileObject,
        FileObject $createEntityRequestFileObject
    ): CreateEntityRequestBuilderImplSkeletonModel {
        return $this->createEntityRequestBuilderImplSkeletonModelAssembler->create(
            $createEntityRequestBuilderFileObject,
            $createEntityRequestBuilderImplFileObject,
            $createEntityRequestDTOFileObject,
            $createEntityRequestFileObject
        );
    }

    public function setCreateEntityRequestBuilderImplSkeletonModelAssembler(
        CreateEntityRequestBuilderImplSkeletonModelAssembler $createEntityRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->createEntityRequestBuilderImplSkeletonModelAssembler = $createEntityRequestBuilderImplSkeletonModelAssembler;
    }
}
