<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PatchEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PatchEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PatchEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\ModelFieldUtility;
use OpenClassrooms\CodeGenerator\Utility\RoutingUtility;

class PatchEntityControllerGenerator extends AbstractGenerator
{
    use CommonControllerFactoryTrait;

    /**
     * @var PatchEntityControllerSkeletonModelBuilder
     */
    private $patchEntityControllerSkeletonModelBuilder;

    /**
     * @var ModelFileObjectFactory
     */
    private $modelFileObjectFactory;

    /**
     * @param PatchEntityControllerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $patchEntityControllerFileObject = $this->buildPatchEntityControllerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($patchEntityControllerFileObject);

        return $patchEntityControllerFileObject;
    }

    private function buildPatchEntityControllerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $patchEntityControllerFileObject = $this->createPatchEntityControllerFileObject();
        $editEntityUseCaseFileObject = $this->createEditEntityUseCaseFileObject();
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();
        $editEntityUseCaseRequestBuilderFileObject = $this->createEditEntityUseCaseRequestBuilderFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityUseCaseDetailResponseFileObject = $this->createEntityUseCaseDetailResponseFileObject();
        $EntityViewModelDetailFileObject = $this->createEntityViewModelDetailFileObject();
        $entityViewModelDetailAssemblerFileObject = $this->createEntityViewModelDetailAssemblerFileObject();
        $patchEntityModelFileObject = $this->createPatchEntityModelFileObject();
        $patchEntityModelFileObject->setFields(ModelFieldUtility::generateModelFieldObjects($entityClassName));
        $entityFileObject = $this->createEntityFileObject();
        $routeAnnotation = $this->createRouteAnnotation();

        $patchEntityControllerFileObject->setContent(
            $this->generateContent(
                [
                    ControllerFileObjectType::API_CONTROLLER_PATCH_ENTITY                             => $patchEntityControllerFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE                        => $editEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST         => $editEntityUseCaseRequestFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER => $editEntityUseCaseRequestBuilderFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                   => $entityNotFoundExceptionFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE            => $entityUseCaseDetailResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL                                    => $EntityViewModelDetailFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER                          => $entityViewModelDetailAssemblerFileObject,
                    ModelFileObjectType::API_MODEL_PATCH_ENTITY                                       => $patchEntityModelFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                       => $entityFileObject,
                ],
                $routeAnnotation
            )
        );

        return $patchEntityControllerFileObject;
    }

    private function createPatchEntityControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_PATCH_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER,
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

    private function createEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityViewModelDetailFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createPatchEntityModelFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_PATCH_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createRouteAnnotation(): string
    {
        return RoutingUtility::create($this->baseNamespace, $this->domain, $this->entity, ClassType::PATCH);
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects, string $routeAnnotation): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects, $routeAnnotation);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function createSkeletonModel(
        array $fileObjects,
        string $routeAnnotation
    ): PatchEntityControllerSkeletonModel {
        return $this->patchEntityControllerSkeletonModelBuilder
            ->create()
            ->withPatchEntityControllerFileObject($fileObjects[ControllerFileObjectType::API_CONTROLLER_PATCH_ENTITY])
            ->withEditEntityUseCaseFileObject($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE])
            ->withEditEntityUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST]
            )
            ->withEditEntityUseCaseRequestBuilderFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER]
            )
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityUseCaseDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withEntityViewModelDetailFileObject($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL])
            ->withEntityViewModelDetailAssemblerFileObject(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER]
            )
            ->withPatchEntityModelFileObject($fileObjects[ModelFileObjectType::API_MODEL_PATCH_ENTITY])
            ->withEntityFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->withRouteAnnotation($routeAnnotation)
            ->build();
    }

    public function setPatchEntityControllerSkeletonModelBuilder(
        PatchEntityControllerSkeletonModelBuilder $patchEntityControllerSkeletonModelBuilder
    ): void {
        $this->patchEntityControllerSkeletonModelBuilder = $patchEntityControllerSkeletonModelBuilder;
    }

    public function setModelFileObjectFactory(ModelFileObjectFactory $modelFileObjectFactory): void
    {
        $this->modelFileObjectFactory = $modelFileObjectFactory;
    }
}
