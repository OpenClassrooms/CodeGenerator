<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntitiesControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModelBuilder;

class GetEntitiesControllerGenerator extends AbstractGenerator
{
    use CommonControllerFactoryTrait;

    /**
     * @var GetEntitiesControllerSkeletonModelBuilder
     */
    private $getEntitiesControllerSkeletonModelBuilder;

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
        $entityViewModelListItemAssemblerFileObject = $this->createEntityViewModelListItemAssemblerFileObject();
        $entityViewModelListItemFileObject = $this->createEntityViewModelListItemFileObject();
        $getEntitiesUseCaseFileObject = $this->createGetEntitiesUseCaseFileObject();
        $getEntitiesUseCaseRequestBuilderFileObject = $this->createGetEntitiesUseCaseRequestBuilderFileObject();
        $route = $this->createRoute();

        $getEntitiesControllerFileObject->setContent(
            $this->generateContent(
                [
                    ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES                              => $getEntitiesControllerFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER                        => $entityViewModelListItemAssemblerFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM                                  => $entityViewModelListItemFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE                        => $getEntitiesUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER => $getEntitiesUseCaseRequestBuilderFileObject,
                ],
                $route
            )
        );

        return $getEntitiesControllerFileObject;
    }

    private function createGetEntitiesControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES,
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

    private function createRoute(): string
    {
        return $this->routingFactoryService->create($this->domain, $this->entity, ClassType::GET_ALL);
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects, string $route): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects, $route);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function createSkeletonModel(array $fileObjects, string $route): GetEntitiesControllerSkeletonModel
    {
        return $this->getEntitiesControllerSkeletonModelBuilder
            ->create()
            ->withGetEntitiesControllerFileObject($fileObjects[ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES])
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
            ->withRoute($route)
            ->build();
    }

    public function setGetEntitiesControllerSkeletonModelBuilder(
        GetEntitiesControllerSkeletonModelBuilder $getEntitiesControllerSkeletonModelBuilder
    ): void {
        $this->getEntitiesControllerSkeletonModelBuilder = $getEntitiesControllerSkeletonModelBuilder;
    }
}
