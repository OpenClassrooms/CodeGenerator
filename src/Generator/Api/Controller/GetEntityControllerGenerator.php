<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\RoutingUtility;

class GetEntityControllerGenerator extends AbstractGenerator
{
    use CommonControllerFactoryTrait;

    /**
     * @var GetEntityControllerSkeletonModelBuilder
     */
    private $getEntityControllerSkeletonModelBuilder;

    /**
     * @param GetEntityControllerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityControllerFileObject = $this->buildGetEntityControllerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityControllerFileObject);

        return $getEntityControllerFileObject;
    }

    private function buildGetEntityControllerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntityControllerFileObject = $this->createGetEntityControllerFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityUseCaseDetailResponseFileObject = $this->createEntityUseCaseDetailResponseFileObject();
        $entityViewModelFileObject = $this->createEntityViewModelFileObject();
        $entityViewModelDetailAssemblerFileObject = $this->createEntityViewModelDetailAssemblerFileObject();
        $getEntityUseCaseFileObject = $this->createGetEntityUseCaseFileObject();
        $routeAnnotation = $this->createRouteAnnotation();

        $getEntityControllerFileObject->setContent(
            $this->generateContent(
                [
                    ControllerFileObjectType::API_CONTROLLER_GET_ENTITY                              => $getEntityControllerFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                  => $entityNotFoundExceptionFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE           => $entityUseCaseDetailResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL                                          => $entityViewModelFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER                         => $entityViewModelDetailAssemblerFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE                        => $getEntityUseCaseFileObject,
                ],
                $routeAnnotation
            )
        );

        return $getEntityControllerFileObject;
    }

    private function createGetEntityControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_GET_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityViewModelFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    public function createGetEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createRouteAnnotation(): string
    {
        return RoutingUtility::create($this->baseNamespace, $this->domain, $this->entity, ClassType::GET);
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
    private function createSkeletonModel(array $fileObjects, string $routeAnnotation): GetEntityControllerSkeletonModel
    {
        return $this->getEntityControllerSkeletonModelBuilder
            ->create()
            ->withCreateGetEntityControllerFileObject($fileObjects[ControllerFileObjectType::API_CONTROLLER_GET_ENTITY])
            ->withCreateEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withCreateEntityUseCaseDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withCreateEntityViewModelFileObject($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL])
            ->withCreateEntityViewModelDetailAssemblerFileObject(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER]
            )
            ->withCreateGetEntityUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE]
            )
            ->withRouteAnnotation($routeAnnotation)
            ->build();
    }

    public function setGetEntityControllerSkeletonModelBuilder(
        GetEntityControllerSkeletonModelBuilder $getEntityControllerSkeletonModelBuilder
    ): void {
        $this->getEntityControllerSkeletonModelBuilder = $getEntityControllerSkeletonModelBuilder;
    }
}
