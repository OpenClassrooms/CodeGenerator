<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\ControllerFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\DeleteEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\DeleteEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\DeleteEntityControllerSkeletonModelAssembler;

class DeleteEntityControllerGenerator extends AbstractGenerator
{
    /**
     * @var DeleteEntityControllerSkeletonModelAssembler
     */
    private $deleteEntityControllerSkeletonModelAssembler;

    /**
     * @var ControllerFileObjectFactory
     */
    private $controllerFileObjectFactory;

    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var UseCaseFileObjectFactory
     */
    private $useCaseFileObjectFactory;

    /**
     * @var UseCaseRequestFileObjectFactory
     */
    private $useCaseRequestFileObjectFactory;

    /**
     * @param DeleteEntityControllerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityControllerFileObject = $this->buildDeleteEntityControllerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityControllerFileObject);

        return $deleteEntityControllerFileObject;
    }

    private function buildDeleteEntityControllerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityControllerFileObject = $this->createDeleteEntityControllerFileObject();
        $deleteEntityFileObject = $this->createDeleteEntityFileObject();
        $deleteEntityRequestBuilderFileObject = $this->createDeleteEntityRequestBuilderFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();

        $deleteEntityControllerFileObject->setContent(
            $this->generateContent(
                $deleteEntityControllerFileObject,
                $deleteEntityFileObject,
                $deleteEntityRequestBuilderFileObject,
                $entityNotFoundExceptionFileObject
            )
        );

        return $deleteEntityControllerFileObject;
    }

    private function createDeleteEntityControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_DELETE_ENTITY,
            $this->entity
        );
    }

    private function createDeleteEntityFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $deleteEntityControllerFileObject,
        FileObject $deleteEntityFileObject,
        FileObject $deleteEntityRequestBuilderFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $deleteEntityControllerFileObject,
            $deleteEntityFileObject,
            $deleteEntityRequestBuilderFileObject,
            $entityNotFoundExceptionFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $deleteEntityControllerFileObject,
        FileObject $deleteEntityFileObject,
        FileObject $deleteEntityRequestBuilderFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityControllerSkeletonModel {
        return $this->deleteEntityControllerSkeletonModelAssembler->create(
            $deleteEntityControllerFileObject,
            $deleteEntityFileObject,
            $deleteEntityRequestBuilderFileObject,
            $entityNotFoundExceptionFileObject
        );
    }

    public function setDeleteEntityControllerSkeletonModelAssembler(
        DeleteEntityControllerSkeletonModelAssembler $deleteEntityControllerSkeletonModelAssembler
    ): void {
        $this->deleteEntityControllerSkeletonModelAssembler = $deleteEntityControllerSkeletonModelAssembler;
    }

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }

    public function setUseCaseRequestFileObjectFactory(
        UseCaseRequestFileObjectFactory $useCaseRequestFileObjectFactory
    ): void {
        $this->useCaseRequestFileObjectFactory = $useCaseRequestFileObjectFactory;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setControllerFileObjectFactory(ControllerFileObjectFactory $controllerFileObjectFactory): void
    {
        $this->controllerFileObjectFactory = $controllerFileObjectFactory;
    }
}
