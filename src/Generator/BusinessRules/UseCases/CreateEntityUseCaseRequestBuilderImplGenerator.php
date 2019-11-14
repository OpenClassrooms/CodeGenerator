<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler
     */
    private $createEntityRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param CreateEntityUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestBuilderImplFileObject = $this->buildCreateEntityUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestBuilderImplFileObject);

        return $createEntityRequestBuilderImplFileObject;
    }

    private function buildCreateEntityUseCaseRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestBuilderFileObject = $this->createCreateEntityUseCaseRequestBuilderFileObject();
        $createEntityRequestBuilderImplFileObject = $this->createCreateEntityUseCaseRequestBuilderImplFileObject();
        $createEntityRequestDTOFileObject = $this->createCreateEntityUseCaseRequestDTOFileObject();
        $createEntityRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();

        $createEntityRequestBuilderImplFileObject->setMethods(
            MethodUtility::buildWitherMethods($entityClassName, $createEntityRequestBuilderFileObject->getShortName())
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

    private function createCreateEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER
        );
    }

    private function createCreateEntityUseCaseRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL
        );
    }

    private function createCreateEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
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
    ): CreateEntityUseCaseRequestBuilderImplSkeletonModel {
        return $this->createEntityRequestBuilderImplSkeletonModelAssembler->create(
            $createEntityRequestBuilderFileObject,
            $createEntityRequestBuilderImplFileObject,
            $createEntityRequestDTOFileObject,
            $createEntityRequestFileObject
        );
    }

    public function setCreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
        CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler $createEntityRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->createEntityRequestBuilderImplSkeletonModelAssembler = $createEntityRequestBuilderImplSkeletonModelAssembler;
    }
}
