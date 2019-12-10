<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModelAssembler;

class CreateEntityUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseRequestDTOSkeletonModelAssembler
     */
    private $createEntityUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @param CreateEntityUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityUseCaseRequestDTOFileObject = $this->buildCreateEntityUseCaseRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityUseCaseRequestDTOFileObject);

        return $createEntityUseCaseRequestDTOFileObject;
    }

    private function buildCreateEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityUseCaseRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();
        $createEntityUseCaseRequestDTOFileObject = $this->createCreateEntityUseCaseRequestDTOFileObject();
        $entityUseCaseCommonRequestFileObject = $this->createEntityUseCaseCommonRequestTraitFileObject();

        $createEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent(
                $createEntityUseCaseRequestFileObject,
                $createEntityUseCaseRequestDTOFileObject,
                $entityUseCaseCommonRequestFileObject
            )
        );

        return $createEntityUseCaseRequestDTOFileObject;
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST
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

    private function createCreateEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    public function createEntityUseCaseCommonRequestTraitFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_ENTITY_USE_CASE_COMMON_REQUEST
        );
    }

    private function generateContent(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject,
        FileObject $entityUseCaseCommonRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $createEntityUseCaseRequestFileObject,
            $createEntityUseCaseRequestDTOFileObject,
            $entityUseCaseCommonRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject,
        FileObject $entityUseCaseCommonRequestFileObject
    ): CreateEntityUseCaseRequestDTOSkeletonModel {
        return $this->createEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $createEntityUseCaseRequestFileObject,
            $createEntityUseCaseRequestDTOFileObject,
            $entityUseCaseCommonRequestFileObject
        );
    }

    public function setCreateEntityUseCaseRequestDTOSkeletonModelAssembler(
        CreateEntityUseCaseRequestDTOSkeletonModelAssembler $createEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->createEntityUseCaseRequestDTOSkeletonModelAssembler = $createEntityUseCaseRequestDTOSkeletonModelAssembler;
    }
}
