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
    private $createEntityRequestSkeletonModelAssembler;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    /**
     * @param CreateEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestFileObject = $this->buildCreateEntityUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestFileObject);

        return $createEntityRequestFileObject;
    }

    private function buildCreateEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();
        $createEntityRequestFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $createEntityRequestFileObject->setContent($this->generateContent($createEntityRequestFileObject));

        return $createEntityRequestFileObject;
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(FileObject $createEntityRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($createEntityRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $createEntityRequestFileObject): CreateEntityUseCaseRequestSkeletonModel
    {
        return $this->createEntityRequestSkeletonModelAssembler->create($createEntityRequestFileObject);
    }

    public function setCreateEntityUseCaseRequestSkeletonModelAssembler(
        CreateEntityUseCaseRequestSkeletonModelAssembler $createEntityRequestSkeletonModelAssembler
    ): void {
        $this->createEntityRequestSkeletonModelAssembler = $createEntityRequestSkeletonModelAssembler;
    }

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }
}
