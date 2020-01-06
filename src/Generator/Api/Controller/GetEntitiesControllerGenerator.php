<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\ControllerFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntitiesControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModelBuilder;

class GetEntitiesControllerGenerator extends AbstractGenerator
{
    /**
     * @var GetEntitiesControllerSkeletonModelBuilder
     */
    private $getEntitiesControllerSkeletonModelAssembler;

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
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    /**
     * @param GetEntitiesControllerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesControllerFileObject = $this->buildGetEntitiesControllerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesControllerFileObject);

        return $getEntitiesControllerFileObject;
    }

    private function buildGetEntitiesControllerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntitiesControllerFileObject = $this->createGetEntitiesControllerFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityUseCaseResponseFileObject = $this->createEntityUseCaseResponseFileObject();
        $entityViewModelListItemAssemblerFileObject = $this->createEntityViewModelListItemAssemblerFileObject();
        $entityViewModelListItemFileObject = $this->createEntityViewModelListItemFileObject();
        $getEntitiesUseCaseFileObject = $this->createGetEntitiesUseCaseFileObject();
        $getEntitiesUseCaseRequestBuilderFileObject = $this->createGetEntitiesUseCaseRequestBuilderFileObject();

        $getEntitiesControllerFileObject->setContent(
            $this->generateContent(
                [
                    ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES                              => $getEntitiesControllerFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                    => $entityNotFoundExceptionFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE                    => $entityUseCaseResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER                        => $entityViewModelListItemAssemblerFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM                                  => $entityViewModelListItemFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE                        => $getEntitiesUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER => $getEntitiesUseCaseRequestBuilderFileObject,
                ]
            )
        );

        return $getEntitiesControllerFileObject;
    }

    private function createGetEntitiesControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES,
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

    private function createEntityUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityViewModelListItemAssemblerFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityViewModelListItemFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntitiesUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntitiesUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function createSkeletonModel(array $fileObjects): GetEntitiesControllerSkeletonModel
    {
        return $this->getEntitiesControllerSkeletonModelAssembler
            ->create()
            ->withGetEntitiesControllerFileObject($fileObjects[ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES])
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityUseCaseResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE]
            )
            ->withEntityViewModelListItemAssemblerFileObject(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER]
            )
            ->withEntityViewModelListItemFileObject($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM])
            ->withGetEntitiesUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE]
            )
            ->withGetEntitiesUseCaseRequestBuilderFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER]
            )
            ->build();
    }

    public function setGetEntitiesControllerSkeletonModelBuilder(
        GetEntitiesControllerSkeletonModelBuilder $getEntitiesControllerSkeletonModelBuilder
    ): void {
        $this->getEntitiesControllerSkeletonModelAssembler = $getEntitiesControllerSkeletonModelBuilder;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
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

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    ): void {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory): void
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }

    public function setControllerFileObjectFactory(ControllerFileObjectFactory $controllerFileObjectFactory): void
    {
        $this->controllerFileObjectFactory = $controllerFileObjectFactory;
    }
}
