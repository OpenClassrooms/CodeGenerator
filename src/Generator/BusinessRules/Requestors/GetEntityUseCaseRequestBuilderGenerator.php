<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderSkeletonModelAssembler;

class GetEntityUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseRequestBuilderSkeletonModelAssembler
     */
    private $getEntityUseCaseRequestBuilderSkeletonModelAssembler;

    private function buildGetEntityUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $getEntityUseCaseRequestBuilderFileObject = $this->createGetEntityUseCaseRequestBuilderFileObject();
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject();

        $getEntityUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $getEntityUseCaseRequestBuilderFileObject,
                $getEntityUseCaseRequestFileObject
            )
        );

        return $getEntityUseCaseRequestBuilderFileObject;
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

    private function createGetEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER,
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

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderSkeletonModel {
        return $this->getEntityUseCaseRequestBuilderSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityUseCaseRequestBuilderFileObject,
            $getEntityUseCaseRequestFileObject
        );
    }

    /**
     * @param GetEntityUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseRequestBuilderFileObject = $this->buildGetEntityUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityUseCaseRequestBuilderFileObject);

        return $getEntityUseCaseRequestBuilderFileObject;
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityUseCaseRequestBuilderFileObject,
            $getEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setGetEntityUseCaseRequestBuilderSkeletonModelAssembler(
        GetEntityUseCaseRequestBuilderSkeletonModelAssembler $getEntityUseCaseRequestBuilderSkeletonModelAssembler
    ): void {
        $this->getEntityUseCaseRequestBuilderSkeletonModelAssembler = $getEntityUseCaseRequestBuilderSkeletonModelAssembler;
    }
}
