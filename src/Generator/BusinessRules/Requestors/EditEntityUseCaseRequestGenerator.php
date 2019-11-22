<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditUseCaseRequestMethodTrait;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class EditEntityUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    use EditUseCaseRequestMethodTrait;

    /**
     * @var EditEntityUseCaseRequestSkeletonModelAssembler
     */
    private $editEntityUseCaseRequestSkeletonModelAssembler;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    private function buildEditEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();
        $editEntityUseCaseRequestFileObject->setMethods($this->buildEditUseCaseRequestMethods($entityClassName));

        $editEntityUseCaseRequestFileObject->setContent($this->generateContent($editEntityUseCaseRequestFileObject));

        return $editEntityUseCaseRequestFileObject;
    }

    private function createEditEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createSkeletonModel(
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestSkeletonModel {
        return $this->editEntityUseCaseRequestSkeletonModelAssembler->create($editEntityUseCaseRequestFileObject);
    }

    /**
     * @param EditEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $editEntityUseCaseRequestFileObject = $this->buildEditEntityUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($editEntityUseCaseRequestFileObject);

        return $editEntityUseCaseRequestFileObject;
    }

    private function generateContent(FileObject $editEntityUseCaseRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($editEntityUseCaseRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setEditEntityUseCaseRequestSkeletonModelAssembler(
        EditEntityUseCaseRequestSkeletonModelAssembler $editEntityUseCaseRequestSkeletonModelAssembler
    ): void {
        $this->editEntityUseCaseRequestSkeletonModelAssembler = $editEntityUseCaseRequestSkeletonModelAssembler;
    }
}
