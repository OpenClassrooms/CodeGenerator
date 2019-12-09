<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModelAssembler;

class GetEntityUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseRequestSkeletonModelAssembler
     */
    private $getEntityUseCaseRequestSkeletonModelAssembler;

    /**
     * @param GetEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseRequestFileObject = $this->buildGetEntityUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityUseCaseRequestFileObject);

        return $getEntityUseCaseRequestFileObject;
    }

    private function buildGetEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject();

        $getEntityUseCaseRequestFileObject->setContent(
            $this->generateContent($getEntityUseCaseRequestFileObject, $entityFileObject)
        );

        return $getEntityUseCaseRequestFileObject;
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

    private function createGetEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $getEntityUseCaseRequestFileObject,
        FileObject $entityFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($getEntityUseCaseRequestFileObject, $entityFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $getEntityUseCaseRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityUseCaseRequestSkeletonModel {
        return $this->getEntityUseCaseRequestSkeletonModelAssembler->create(
            $getEntityUseCaseRequestFileObject,
            $entityFileObject
        );
    }

    public function setGetEntityUseCaseRequestSkeletonModelAssembler(
        GetEntityUseCaseRequestSkeletonModelAssembler $getEntityUseCaseRequestSkeletonModelAssembler
    ): void {
        $this->getEntityUseCaseRequestSkeletonModelAssembler = $getEntityUseCaseRequestSkeletonModelAssembler;
    }
}
