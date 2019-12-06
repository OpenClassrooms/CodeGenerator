<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestSkeletonModelAssembler;

class DeleteEntityUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var DeleteEntityUseCaseRequestSkeletonModelAssembler
     */
    private $deleteEntityUseCaseRequestSkeletonModelAssembler;

    private function buildDeleteEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityUseCaseRequestFileObject = $this->createDeleteEntityUseCaseRequestFileObject();

        $deleteEntityUseCaseRequestFileObject->setContent(
            $this->generateContent($deleteEntityUseCaseRequestFileObject)
        );

        return $deleteEntityUseCaseRequestFileObject;
    }

    private function createDeleteEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createSkeletonModel(FileObject $deleteEntityUseCaseRequestFileObject): DeleteEntityUseCaseRequestSkeletonModel
    {
        return $this->deleteEntityUseCaseRequestSkeletonModelAssembler->create($deleteEntityUseCaseRequestFileObject);
    }

    /**
     * @param DeleteEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityUseCaseRequestFileObject = $this->buildDeleteEntityUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityUseCaseRequestFileObject);

        return $deleteEntityUseCaseRequestFileObject;
    }

    private function generateContent(FileObject $deleteEntityUseCaseRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($deleteEntityUseCaseRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setDeleteEntityUseCaseRequestSkeletonModelAssembler(
        DeleteEntityUseCaseRequestSkeletonModelAssembler $deleteEntityUseCaseRequestSkeletonModelAssembler
    ): void {
        $this->deleteEntityUseCaseRequestSkeletonModelAssembler = $deleteEntityUseCaseRequestSkeletonModelAssembler;
    }
}
