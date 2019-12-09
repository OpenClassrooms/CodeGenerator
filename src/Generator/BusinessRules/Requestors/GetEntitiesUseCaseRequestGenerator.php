<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestSkeletonModelAssembler;

class GetEntitiesUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntitiesUseCaseRequestSkeletonModelAssembler
     */
    private $getEntitiesUseCaseRequestSkeletonModelAssembler;

    /**
     * @param GetEntitiesUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesUseCaseRequestFileObject = $this->buildGetEntitiesUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesUseCaseRequestFileObject);

        return $getEntitiesUseCaseRequestFileObject;
    }

    private function buildGetEntitiesUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject();

        $getEntitiesUseCaseRequestFileObject->setContent(
            $this->generateContent($getEntitiesUseCaseRequestFileObject)
        );

        return $getEntitiesUseCaseRequestFileObject;
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

    private function generateContent(FileObject $getEntitiesUseCaseRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($getEntitiesUseCaseRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseRequestSkeletonModel {
        return $this->getEntitiesUseCaseRequestSkeletonModelAssembler->create($getEntitiesUseCaseRequestFileObject);
    }

    public function setGetEntitiesUseCaseRequestSkeletonModelAssembler(
        GetEntitiesUseCaseRequestSkeletonModelAssembler $getEntitiesUseCaseRequestSkeletonModelAssembler
    ): void {
        $this->getEntitiesUseCaseRequestSkeletonModelAssembler = $getEntitiesUseCaseRequestSkeletonModelAssembler;
    }
}
