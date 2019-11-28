<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class CreateEntityUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseRequestSkeletonModelAssembler
     */
    private $createEntityUseCaseRequestSkeletonModelAssembler;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    /**
     * @param CreateEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityUseCaseRequestFileObject = $this->buildCreateEntityUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityUseCaseRequestFileObject);

        return $createEntityUseCaseRequestFileObject;
    }

    private function buildCreateEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityUseCaseRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();
        $createEntityUseCaseRequestFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $createEntityUseCaseRequestFileObject->setContent($this->generateContent($createEntityUseCaseRequestFileObject));

        return $createEntityUseCaseRequestFileObject;
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(FileObject $createEntityUseCaseRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($createEntityUseCaseRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseRequestSkeletonModel {
        return $this->createEntityUseCaseRequestSkeletonModelAssembler->create($createEntityUseCaseRequestFileObject);
    }

    public function setCreateEntityUseCaseRequestSkeletonModelAssembler(
        CreateEntityUseCaseRequestSkeletonModelAssembler $createEntityUseCaseRequestSkeletonModelAssembler
    ): void {
        $this->createEntityUseCaseRequestSkeletonModelAssembler = $createEntityUseCaseRequestSkeletonModelAssembler;
    }

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }
}
