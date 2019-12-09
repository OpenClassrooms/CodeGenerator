<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderSkeletonModelAssembler;

class GetEntitiesUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntitiesUseCaseRequestBuilderSkeletonModelAssembler
     */
    private $getEntitiesUseCaseRequestBuilderSkeletonModelAssembler;

    /**
     * @param GetEntitiesUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesUseCaseRequestBuilderFileObject = $this->buildGetEntitiesUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesUseCaseRequestBuilderFileObject);

        return $getEntitiesUseCaseRequestBuilderFileObject;
    }

    private function buildGetEntitiesUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject();
        $getEntitiesUseCaseRequestBuilderFileObject = $this->createGetEntitiesUseCaseRequestBuilderFileObject();

        $getEntitiesUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent($getEntitiesUseCaseRequestFileObject, $getEntitiesUseCaseRequestBuilderFileObject)
        );

        return $getEntitiesUseCaseRequestBuilderFileObject;
    }

    private function createGetEntitiesUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntitiesUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $getEntitiesUseCaseRequestFileObject,
        FileObject $getEntitiesUseCaseRequestBuilderFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $getEntitiesUseCaseRequestFileObject,
            $getEntitiesUseCaseRequestBuilderFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $getEntitiesUseCaseRequestFileObject,
        FileObject $getEntitiesUseCaseRequestBuilderFileObject
    ): GetEntitiesUseCaseRequestBuilderSkeletonModel {
        return $this->getEntitiesUseCaseRequestBuilderSkeletonModelAssembler->create(
            $getEntitiesUseCaseRequestFileObject,
            $getEntitiesUseCaseRequestBuilderFileObject
        );
    }

    public function setGetEntitiesUseCaseRequestBuilderSkeletonModelAssembler(
        GetEntitiesUseCaseRequestBuilderSkeletonModelAssembler $getEntitiesUseCaseRequestBuilderSkeletonModelAssembler
    ): void {
        $this->getEntitiesUseCaseRequestBuilderSkeletonModelAssembler = $getEntitiesUseCaseRequestBuilderSkeletonModelAssembler;
    }
}
