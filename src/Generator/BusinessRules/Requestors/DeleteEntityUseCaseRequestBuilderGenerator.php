<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderSkeletonModelAssembler;

class DeleteEntityUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var DeleteEntityUseCaseRequestBuilderSkeletonModelAssembler
     */
    private $deleteEntityUseCaseRequestBuilderSkeletonModelAssembler;

    /**
     * @param DeleteEntityUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityUseCaseRequestBuilderFileObject = $this->buildDeleteEntityUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityUseCaseRequestBuilderFileObject);

        return $deleteEntityUseCaseRequestBuilderFileObject;
    }

    private function buildDeleteEntityUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityUseCaseRequestBuilderFileObject = $this->createDeleteEntityUseCaseRequestBuilderFileObject();
        $deleteEntityUseCaseRequestFileObject = $this->createDeleteEntityUseCaseRequestFileObject();

        $deleteEntityUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent($deleteEntityUseCaseRequestBuilderFileObject, $deleteEntityUseCaseRequestFileObject)
        );

        return $deleteEntityUseCaseRequestBuilderFileObject;
    }

    private function createDeleteEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $deleteEntityUseCaseRequestBuilderFileObject,
            $deleteEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestBuilderSkeletonModel {
        return $this->deleteEntityUseCaseRequestBuilderSkeletonModelAssembler->create(
            $deleteEntityUseCaseRequestBuilderFileObject,
            $deleteEntityUseCaseRequestFileObject
        );
    }

    public function setDeleteEntityUseCaseRequestBuilderSkeletonModelAssembler(
        DeleteEntityUseCaseRequestBuilderSkeletonModelAssembler $deleteEntityUseCaseRequestBuilderSkeletonModelAssembler
    ): void {
        $this->deleteEntityUseCaseRequestBuilderSkeletonModelAssembler = $deleteEntityUseCaseRequestBuilderSkeletonModelAssembler;
    }
}
